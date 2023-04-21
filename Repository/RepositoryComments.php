<?php

namespace Repository {

    use Model\Comments;
    use PDO;

    interface RepositoryComments
    {
        public function insert(Comments $comments): Comments;
        public function findById(int $id): ?Comments;
        public function findAll(): array;
    }

    class RepositoryCommentsImpl implements RepositoryComments
    {
        public function __construct(private PDO $connenction)
        {
        }
        public function insert(Comments $comments): Comments
        {
            // membuat kode sql
            $sql = "INSERT INTO comments(email, comment) VALUES (?,?)";
            $statement = $this->connenction->prepare($sql);
            $statement->execute([$comments->getEmail(), $comments->getComment()]);

            // cek apakah ada id yang tergenerate
            $comments->setId((int)$this->connenction->lastInsertId());

            // kembalikan hasil query comment
            return $comments;
        }

        public function findById(int $id): ?Comments
        {
            $sql = "SELECT * FROM comments WHERE id = ?";
            $statement = $this->connenction->prepare($sql);
            $statement->execute([$id]);

            // cek apakah ada id di database
            if ($row = $statement->fetch()) {
                return new Comments(
                    // menggunakan named parameter
                    id: $row["id"],
                    email: $row["email"],
                    comment: $row["comment"]
                );
            } else {
                return null;
            }
        }

        public function findAll(): array
        {

            $sql = "SELECT * FROM comments";
            $statement = $this->connenction->query($sql);

            $array = [];
            while($row = $statement->fetch()){
                $array[] =  new Comments(
                    id: $row["id"],
                    email: $row["email"],
                    comment: $row["comment"]
                );
            }

            return $array;
        }
    }
}
