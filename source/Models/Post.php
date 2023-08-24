<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 */
class Post extends Model
{
    /** @var bool*/
    private $all;

    /**
     * @param bool $all = ignore status and post_at
     */
    public function __construct(bool $all = false)
    {
        $this->all = $all;
        parent::__construct("posts", ["id"], ["id", "title", "subtitle", "content"]);
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
        $terms = "status = :status AND post_at <= NOW()" .($terms ? " AND {$terms}" : "");
        $params = "status=post".($params ? "&{$params}" : "");
        }
        return parent::find($terms, $params, $colums);

    }

    /**
     * @param string $uri
     * @param string $columns
     * @return Post|null
     */
    public function findByUri(string $uri, string $columns = "*"): ?Post
    {
        $find = $this->find("uri = :uri", "uri={$uri}", $columns);
        return $find->fetch();
    }

    /**
     * @return User|null
     */
    public function author(): ?User
    {
        if($this->author) {
            return (new User())->findById($this->author);
        }
        return null;
    }

    /**
     * @return Category|null
     */
    public function category(): ?Category
    {
        if($this->category) {
            return(new Category())->findById($this->category);
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
            $postId = $this->id;
            $this->update($this->safe(), "id = :id", "id={$postId}");
            if($this->fail){
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }
        /** Post Create */
        $this->data = $this->findById($postId)->data();
        $this->message->success("Registro atualizado com sucesso!");
        return true;
    }
}