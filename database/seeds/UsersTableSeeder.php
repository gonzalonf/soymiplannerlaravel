<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->truncate();
        DB::insert($this->users());


    }
    public function users()
    {
        return 'INSERT INTO users VALUES (1,"Juan","Perez","Caballito","1512345678","juan@perez.com","$2y$10$lDRDfYDJxaW6pqgQwSAcCONRg5ZTuf6fodeUQx107sihY87QYfqJ.","ePGD2dmyi054j8iZvCFiPfOh0585wDRwWgo752vzgaAWrflZ6bW1neKLhNLr","2017-07-07 08:20:40","2017-07-07 08:20:40",NULL,0),(2,"Maria","Lopez","Colegiales","1512345678","maria@lopez.com","$2y$10$ro3ulXdyJsVqUh3afugGt.k/b9ERLn1Jc1OdNEiUJpbaqoCWc5opq","fB9P6sIncnVGw8XtoVUuto9zb8Q4GwZi3QSCHqKHJtc4EzOVDvcb7bs7Oreu","2017-07-07 09:06:05","2017-07-07 09:06:05",NULL,0),(3,"Carlos","Diaz","Palermo","1512345678","carloz@diaz.com","$2y$10$vtCrsRY.ss.YzacHAkLLI.7Q5nR7ExsPxVkESZEIQH8lMXQ2vqheG","d1sgJCALIiBksHznM3PqX8CPyaZ0QkWBIv6m56R1ScpNBJJVrGpJsFX0Cr8h","2017-07-07 09:07:09","2017-07-07 09:07:09",NULL,0),(4,"Romina","Gomez","Recoleta","1512345678","romina@gomez.com","$2y$10$vt2ih0upXmgoVZpYMCr11eSbngE9SxNalsqr4sAywHPl4pD8dNm36","bDhytozyDR3eEXsSOaFzU48d8AEkd9nksRTwiPvg5Xd0RJlv67eyyQ15INJ4","2017-07-07 09:11:00","2017-07-07 09:11:00",NULL,0),(5,"Jose","Juarez","San Nicolas","1512345678","jose@juarez.com","$2y$10$xkCyw3dQ/.FhTYQ2YH3A4ee2DPMHjrYi47bAZg8FgUDcavRe.4kjG","bNymrjgmzPVls5xij5WX5OtWBq64IV2KYqclfGm31EH77jHrQ0NPKS9L6hKj","2017-07-07 09:26:58","2017-07-07 09:26:58",NULL,0),(6,"Marcelo","Garcia","Abasto","1512345678","marcelo@garcia.com","$2y$10$2dSUoCVl0Jx9z7pnwdS9.ORR/q7B58JTj/v5I7e/AfVJhbNeFRY4i","pUHNkaXSKAnj4Rg6jQNdEX9CKvz4d25QVU2Jdxg6A6X8bQWHes4VNM2PEXZ4","2017-07-07 09:57:16","2017-07-07 09:57:16",NULL,0),(7,"Martin","Carrazco","La Boca","1512345678","martin@carrazco.com","$2y$10$xkCyw3dQ/.FhTYQ2YH3A4ee2DPMHjrYi47bAZg8FgUDcavRe.4kjG",NULL,"2017-07-07 09:57:17","2017-07-07 09:57:17",NULL,0),(8,"Miguel","Blanco","Constitucion","1512345678","miguel@blanco.com","$2y$10$vtCrsRY.ss.YzacHAkLLI.7Q5nR7ExsPxVkESZEIQH8lMXQ2vqheG",NULL,"2017-07-07 09:57:18","2017-07-07 09:57:18",NULL,0),(9,"Marta","Sosa","San Nicolas","1512345678","marta@sosa.com","$2y$10$xkCyw3dQ/.FhTYQ2YH3A4ee2DPMHjrYi47bAZg8FgUDcavRe.4kjG",NULL,"2017-07-07 09:57:19","2017-07-07 09:57:19",NULL,0),(10,"Lautaro","Gonzalez","Belgrano","1512345678","lautaro@gonzales.com","$2y$10$vtCrsRY.ss.YzacHAkLLI.7Q5nR7ExsPxVkESZEIQH8lMXQ2vqheG",NULL,"2017-07-07 09:57:20","2017-07-07 09:57:20",NULL,0),(11,"Analia","Ortega","Parque Patricios","1512345678","analia@ortega","$2y$10$ro3ulXdyJsVqUh3afugGt.k/b9ERLn1Jc1OdNEiUJpbaqoCWc5opq",NULL,"2017-07-07 09:57:21","2017-07-07 09:57:21",NULL,0),(12,"Mariela","Ferraro","Villa Urquiza","1512345678","maria@ferraro.com","$2y$10$HY9j9eYMjBS69MjSpTU5buOSQAf.MjKF/Be7FGenh4PMRLULOclPe","7N8tcyzIwpS3HhpmvU6aLQbYnX90JYnzFBCCILRJP8RhFThGL0mzG3mK30NH","2017-07-09 14:08:33","2017-07-09 14:08:33",NULL,0);';
    }
}
