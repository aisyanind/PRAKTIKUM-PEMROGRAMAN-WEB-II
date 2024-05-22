<?php
class Model {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function insertMember($data) {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
            $stmt = $this->pdo->prepare("INSERT INTO member ($columns) VALUES ($placeholders)");
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function updateMember($data) {
        try {
            $set = '';
            foreach ($data as $key => $value) {
                $set .= "$key=:$key, ";
            }
            $set = rtrim($set, ', '); 
            $stmt = $this->pdo->prepare("UPDATE member SET $set WHERE id_member = :id_member");
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function readMemberById($id) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM member WHERE id_member = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function readAllMembers() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM member");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function deleteMember($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM member WHERE id_member = ?");
            $stmt->bindValue(1, $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function readAllData($table) {
        try {
            $stmt = $this->pdo->query("SELECT * FROM $table");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function deleteDataByStruktur($table, $id, $column) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM $table WHERE $column = ?");
            $stmt->bindValue(1, $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function insertBuku($data) {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
            $stmt = $this->pdo->prepare("INSERT INTO buku ($columns) VALUES ($placeholders)");
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function readDataByStruktur($id) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM buku WHERE id_buku = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function updateData($table, $primaryKey, $id, $data) {
        try {
            // Construct the SET part of the SQL query
            $set = '';
            foreach ($data as $key => $value) {
                // Skip the primary key when constructing the SET part
                if ($key !== $primaryKey) {
                    $set .= "$key=:$key, ";
                }
            }
            $set = rtrim($set, ', '); // Remove the trailing comma
    
            // Prepare the SQL query
            $stmt = $this->pdo->prepare("UPDATE $table SET $set WHERE $primaryKey = :id");
    
            // Bind the parameter for the primary key
            $stmt->bindValue(':id', $id);
    
            // Bind parameters for the SET part of the query
            foreach ($data as $key => $value) {
                // Skip the primary key when binding parameters
                if ($key !== $primaryKey) {
                    $stmt->bindValue(":$key", $value);
                }
            }
    
            // Execute the query
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function selectDataById($table, $id, $primaryKey) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $primaryKey = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function insertPeminjaman($data) {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
            $stmt = $this->pdo->prepare("INSERT INTO peminjaman ($columns) VALUES ($placeholders)");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
            return false;
        }
    }  
}
?>