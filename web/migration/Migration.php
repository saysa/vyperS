<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 27/11/14
 * Time: 21:53
 */

class Migration {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function addArtists($artists)
    {
        foreach ($artists as $post) {

            $query = $this->db->pdo->prepare("INSERT INTO artist SET

                type_id = 1,
                name = :name,
                profile = :profile,
                biography = :biography,
                author = :author,
                translator = :translator,
                keywords = :keywords,
                live = 1,
                deleted = 0,
                created = :created,
                modified = :modified,
                slug = :slug

            ");
            
            $uniq = uniqid();

            $query->bindParam(":name", $post->name);
            $query->bindParam(":profile", $post->profile);
            $query->bindParam(":biography", $post->biography);
            $query->bindParam(":author", $post->author);
            $query->bindParam(":translator", $post->translator);
            $query->bindParam(":keywords", $post->keywords);
            $query->bindParam(":created", $post->created);
            $query->bindParam(":modified", $post->modified);
            $query->bindParam(":slug", $uniq);

            $query->execute();
        }
    }

    public function addPictures($pictures)
    {
        foreach ($pictures as $post) {

            switch ($post->album) {
                case 3:
                    $album = 2;
                    break;
                case 4:
                    $album = 1;
                    break;
                case 5:
                    $album = 4;
                    break;
                case 6:
                    $album = 5;
                    break;
                case 7:
                    $album = 6;
                    break;
                case 8:
                    $album = 7;
                    break;
                case 9:
                    $album = 8;
                    break;
                case 10:
                    $album = 9;
                    break;
                case 11:
                    $album = 10;
                    break;
                case 12:
                    $album = 11;
                    break;
                case 13:
                    $album = 12;
                    break;
                case 14:
                    $album = 13;
                    break;
            }

            $query = $this->db->pdo->prepare("INSERT INTO picture SET

                album_id = :album,
                filename = :filename,
                name = :name,
                mime = :mime,
                size = :size,
                width = :width,
                height = :height,
                live = 1,
                deleted = 0,
                created = :created,
                modified = :modified

            ");

            $query->bindParam(":album", $album);
            $query->bindParam(":filename", $post->filename);
            $query->bindParam(":name", $post->name);
            $query->bindParam(":mime", $post->mime);
            $query->bindParam(":size", $post->size);
            $query->bindParam(":width", $post->width);
            $query->bindParam(":height", $post->height);
            $query->bindParam(":created", $post->created);
            $query->bindParam(":modified", $post->modified);

            $query->execute();
        }
    }

    public function selectPictures()
    {
        return $this->db->selectOLD(array(
            'table' => 'picture'
        ));
    }

    public function selectArtists()
    {
        return $this->db->selectOLD(array(
            'table' => 'artist'
        ));
    }
} 