<?php
    class Database 
    {
        private $db;
        private $db_host = 'localhost';
        private $db_user = 'root';
        private $db_password = '';
        private $db_name = 'panda_rek1';

        // Konstruktor, po??czenie z baz? danych.
        public function __construct()
        {
            $this->db = new mysqli($this -> db_host, $this -> db_user, $this -> db_password, $this -> db_name);

            if(mysqli_connect_error())
            {
                echo mysqli_connect_error();
            }
            else
            {
               // echo "Po??czono z baz? danych!";
            }
        }

        /* Metody */

        //Wykonywanie zapyta?
        public function m_query($sql)
        {
            $query_result = $this->db->query($sql);

            return $query_result;
        }

        // Wiersze - zwr?cona liczba; SELECT.
        public function m_numr($query_result)
        {
            $numRows = $query_result->num_rows;

            if($numRows > 0) 
            {
                return $numRows;
            } 
            else 
            {
                return false;
            }
        }

        // Dzia?anie na wiersze - INSERT, UPDATE;
        public function m_affectedRows()
        {
            $affectedRows = $this->db->affected_rows;

            if($affectedRows > 0) 
            {
                return $affectedRows;
            } 
            else 
            {
                return false;
            }
        }

        public function escapeString($input)
        {
            $escapedString = $this->db->real_escape_string($input);

            return $escapedString;
        }
    }

    $database = new Database();