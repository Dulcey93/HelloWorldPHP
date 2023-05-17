<?php
/*     header("Content-type:application/json; charset=UTF-8");
    /* $obj = (object) [];
    $obj->name = (string) "John";
    $obj->age = (int) 30;
    $obj->city = (string) "New York";
    echo json_encode($_GET["name"]); */
/*     $config = (array) [];
    $config["http"]= (array) [];
    $config["http"]["method"] = (string) "GET";
    $config["http"]["header"] = (string) "Content-type:application/json";
    $strm = stream_context_create($config);

    //$res = file_get_contents("https://pokeapi.co/api/v2/pokemon". $_GET["name"], false, $strm);

    $res = file_get_contents("https://pokeapi.co/api/v2/pokemon/", false, $strm);

    echo $res; */

    //Creamos un api para consumir la api de pokemon
    header("Content-type:application/json; charset=UTF-8");
    $config = (array) [];
    $config["http"]= (array) [];
    $config["http"]["method"] = (string) "GET";
    $config["http"]["header"] = (string) "Content-type:application/json";
    $strm = stream_context_create($config);
    



    $obj = new StringHelper("John", 30, 1);
    echo $obj->nombre;
    //Obtenemos el id del objeto medianto el getter
    //Se pueden utilizar `` para concatenar strings
    printf(`El id del objeto es: `, $obj->getId());
    //Modificamos el id del objeto medianto el setter
    $obj->setId(2);
    printf(`El id del objeto es: `, $obj->getId());
    //Llamamos a los metodos de la clase
    $obj->length("Hola mundo");
    $obj->trim("Hola mundo");
    $obj->toUpper("Hola mundo");
    $obj->toLower("Hola mundo");
    $obj->firstUpper("hola mundo");
    $obj->replace("Hola mundo", "mundo", "marte");
    $obj->search("Hola mundo", "mundo");

    //Creamos una clase para definir metodos que realicen las operaciones más comunes de php
    class StringHelper{
        public $nombre;
        public $edad;
        private $id;
        //Definimos el constructor de la clase
        function __construct($nombre, $edad, $id){
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->id = $id;
        }
        //Definimos el destructor de la clase
        //El destructor se utiliza para liberar recursos que se hayan reservado en el constructor de la clase o en cualquier otro método de la clase y que ya no sean necesarios para el programa.
        function __destruct(){
            print "La clase ha sido destruida".__CLASS__."\n";
        }

        public function length(string $str): string{
            return printf(`Este es el tamaño del string: `, strlen($str));
        }

        public function trim(string $str): string{
            return printf(`Este es el string sin espacios: `, trim($str));
        }

        public function toUpper(string $str): string{
            return printf(`Este es el string en mayusculas: `, strtoupper($str));
        }

        public function toLower(string $str): string{
            return printf(`Este es el string en minusculas: `, strtolower($str));
        }

        public function firstUpper(string $str): string{
            return printf(`Este es el string con la primera letra en mayuscula: `, ucfirst($str));
        }

        public function replace(string $str, string $str1, string $str2): string{
            //str es el string a reemplazar
            //str1 es el string a buscar
            //str2 es el string que reemplazará en str1
            return printf(`Este es el string reemplazado: `, str_replace($str, $str1, $str2));
        }

        public function search(string $str, string $str1): string{
            //str es el string a buscar
            //str1 es el string a buscar en str
            //Utilizamos isset para validar que el $str1 exista dentro de str
            //Utilizamos operador ternario para validar si existe $str1
            return printf(`Este es el string reemplazado: `, isset($str1) ? strpos($str, $str1) : "No existe");
        }

        //Utilizamos getters y setters de php para acceder a los atributos privados de la clase
        //Los parametros que reciben deben ser del mismo tipo que el atributo
        public function getId(): int{
            return $this->id;
        }

        public function setId(int $id): void{
            $this->id = $id;
        }

        //Funcion para recibir un JSON y convertirlo a objeto para poder acceder a sus atributos
        public function jsonToObject(string $json): object{
            $obj = json_decode($json);
            return $obj;
        }

        //Funcion para recibir un JSON y convertirlo a objeto para poder acceder a sus atributos utilizando func_get_arg
        public function jsonToObject2(): object{
            $obj = json_decode(func_get_arg(0));
            return $obj;
        }

    }
?>