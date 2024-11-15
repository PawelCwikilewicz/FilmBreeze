<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use PDOException;

class DashboardController extends Controller
{
    public function index(){
        
        // $host = "filmbreeze.clq0oucua0k7.eu-north-1.rds.amazonaws.com"; // np. adres IP lub nazwa domeny serwera bazy danych
        // $dbname = "filmbreezeDB";
        // $username = "admin";
        // $password = "admin123";
        
        // try {
        //     // Tworzenie połączenia za pomocą PDO
        //     $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
        //     $pdo = new PDO($dsn, $username, $password);
            
        //     // Ustawienia PDO dla błędów i wyjątków
        //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        //     echo "Połączono pomyślnie!";
            
        //     // Tutaj możesz wykonywać zapytania do bazy danych
        // }
        // catch (PDOException $e) {
        //     // Obsługa błędu połączenia
        //     echo "Połączenie nieudane: " . $e->getMessage();
        // }
        
        // // Zamknięcie połączenia przez ustawienie obiektu na null (opcjonalne)
        // $pdo = null;
        

        $movies = [
            [
                'title' => 'Up',
                'year' => 2009,
            ],
            [
                'title' => 'Zodiac',
                'year' => 2007,
            ]
        ];



        return view('welcome',['movies' => $movies]);
    }

}
