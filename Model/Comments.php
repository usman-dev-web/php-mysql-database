<?php

namespace Model{

    class Comments{
        public function __construct(private ?int $id = null, private ?string $email = null, private ?string $comment = null)
        {
            
        }

        // get id
        public function getId(){
            return $this->id;
        }

        // set id
        public function setId(int $id){
            $this->id = $id;
        }

        // get email
        public function getEmail(){
            return $this->email;
        }

        // set email
        public function setEmail(string $email){
            $this->email = $email;
        }

        // get comment
        public function getComment(){
            return $this->comment;
        }

        // set comment
        public function setComment(string $comment){
            $this->comment = $comment;
        }
    }
}