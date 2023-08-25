<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 */
class Contact extends Model
{
    /** @var bool*/
    private $all;

    /**
     * @param bool $all = ignore status and post_at
     */
    public function __construct(bool $all = false)
    {
        $this->all = $all;
        parent::__construct("contacts", ["id"], ["id", "colaborattor", "ramal"]);
    }

    //Poliformismo da Find

    /**
     * @param string|null $terms
     * @param string|null $params
     * @param string $colums
     * @return mixed|Post
     */
    public function find(?string $terms = null, ?string $params = null, string $colums = "*")
    {
        //Condições para exibir apenas postagens atuais até hoje
        if(!$this->all){
        $terms = "status = :status";
        $params = "status=post";
        }
        return parent::find($terms, $params, $colums);

    }

    /**
     * @param string $uri
     * @param string $columns
     * @return Post|null
     */
    public function findByUri(string $uri, string $columns = "*"): ?Contact
    {
        $find = $this->find("uri = :uri", "uri={$uri}", $columns);
        return $find->fetch();
    }

    /**
     * @return Category|null
     */
    public function sector(): ?Sector
    {
        if($this->sector_id) {
            return(new Sector())->findById($this->sector_id);
        }
        return null;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        /** Post Update */
        if(!empty($this->id)) { // Se já estiver cadastrado ...
            $contactId = $this->id;
            $this->update($this->safe(), "id = :id", "id={$contactId}");
            if($this->fail){
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }
        /** Post Create */
        $this->data = $this->findById($contactId)->data();
        $this->message->success("Registro atualizado com sucesso!");
        return true;
    }
}