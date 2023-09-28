echo Realizando backup do MySQL...
c:\xampp\mysql\bin\mysqldump --single-transaction=TRUE -u smsubcoti -pyvTjF3VLK)RktC7W smsub users > Z:\users\users_%date:~0,2%%date:~3,2%%date:~6,4%.sql
c:\xampp\mysql\bin\mysqldump --single-transaction=TRUE -u smsubcoti -pyvTjF3VLK)RktC7W smsub sectors > Z:\sectors\sectors_%date:~0,2%%date:~3,2%%date:~6,4%.sql
c:\xampp\mysql\bin\mysqldump --single-transaction=TRUE -u smsubcoti -pyvTjF3VLK)RktC7W smsub posts > Z:\posts\posts_%date:~0,2%%date:~3,2%%date:~6,4%.sql
c:\xampp\mysql\bin\mysqldump --single-transaction=TRUE -u smsubcoti -pyvTjF3VLK)RktC7W smsub contacts > Z:\contacts\contacts_%date:~0,2%%date:~3,2%%date:~6,4%.sql
c:\xampp\mysql\bin\mysqldump --single-transaction=TRUE -u smsubcoti -pyvTjF3VLK)RktC7W smsub report_access > Z:\report_access\report_access_%date:~0,2%%date:~3,2%%date:~6,4%.sql
c:\xampp\mysql\bin\mysqldump --single-transaction=TRUE -u smsubcoti -pyvTjF3VLK)RktC7W smsub report_online > Z:\report_online\report_online_%date:~0,2%%date:~3,2%%date:~6,4%.sql
echo Backup concluído com sucesso.