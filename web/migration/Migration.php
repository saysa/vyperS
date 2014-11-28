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

    public function addArticles($opt)
    {
        foreach ($opt['articles'] as $post) {

            foreach ($opt['pictures'] as $oldPic) {
                if ($oldPic->id == $post->relatedPicture) {

                    $r = $this->db->select(array(
                        'table' => 'picture',
                        'where' => array('filename' => $oldPic->filename),
                    ));

                    $obj = $r[0];
                    $post->picture = $obj->id;
                }
            }

            foreach ($opt['articleTypes'] as $oldArtType) {
                if ($oldArtType->id == $post->type) {

                    switch ($oldArtType->id) {

                        case 2:
                            $post->articleTypeID = 4;
                            break;
                        case 6:
                            $post->articleTypeID = 5;
                            break;
                        case 7:
                            $post->articleTypeID = 6;
                            break;
                        case 8:
                            $post->articleTypeID = 7;
                            break;
                        case 10:
                            $post->articleTypeID = 8;
                            break;
                    }
                }
            }

            $slug = uniqid();


            $query = $this->db->pdo->prepare("INSERT INTO article SET

                user_id = 1,
                continent_id = 1,
                article_type_id = :article_type_id,
                picture_id = :picture_id,
                highlight = :highlight,
                title = :title,
                description = :description,
                text = :text,
                releaseDate = :releaseDate,
                releaseTime = :releaseTime,
                author = :author,
                translator = :translator,
                source = :source,
                sourceURL = :sourceURL,
                metaKeywords = :metaKeywords,
                slug = :slug,
                live = 1,
                deleted = 0,
                created = :created,
                modified = :modified

            ");


            $query->bindParam(":article_type_id", $post->articleTypeID);
            $query->bindParam(":picture_id", $post->picture);
            $query->bindParam(":highlight", $post->highlight);
            $query->bindParam(":title", $post->title);
            $query->bindParam(":text", $post->text);
            $query->bindParam(":description", $post->description);
            $query->bindParam(":releaseDate", $post->releaseDate);
            $query->bindParam(":releaseTime", $post->releaseTime);
            $query->bindParam(":author", $post->author);
            $query->bindParam(":translator", $post->translator);
            $query->bindParam(":source", $post->source);
            $query->bindParam(":sourceURL", $post->sourceURL);
            $query->bindParam(":metaKeywords", $post->metaKeywords);
            $query->bindParam(":slug", $slug);
            $query->bindParam(":created", $post->created);
            $query->bindParam(":modified", $post->modified);

            $query->execute();
        }
    }

    public function addDiscos($opt)
    {
        foreach ($opt['discos'] as $post) {

            //medium sind  gleich
            // discotype gleich
            // country 104
            // continent 1

            foreach ($opt['pictures'] as $oldPic) {
                if ($oldPic->id == $post->file) {

                    $r = $this->db->select(array(
                        'table' => 'picture',
                        'where' => array('filename' => $oldPic->filename),
                    ));

                    $obj = $r[0];
                    $post->picture = $obj->id;
                }
            }

            $slug = uniqid();


            $query = $this->db->pdo->prepare("INSERT INTO disco SET

                medium_id = :medium_id,
                type_id = :type_id,
                country_id = 104,
                continent_id = 1,
                picture_id = :picture_id,
                title = :title,
                titleReal = :titleReal,
                cdJapan = :cdJapan,
                date = :date,
                labelMusic = :labelMusic,
                details = :details,
                slug = :slug,
                live = 1,
                deleted = 0,
                created = :created,
                modified = :modified

            ");

            $query->bindParam(":medium_id", $post->medium);
            $query->bindParam(":type_id", $post->type);
            $query->bindParam(":picture_id", $post->picture);
            $query->bindParam(":title", $post->title);
            $query->bindParam(":titleReal", $post->titleReal);
            $query->bindParam(":cdJapan", $post->cdJapan);
            $query->bindParam(":date", $post->date);
            $query->bindParam(":labelMusic", $post->labelMusic);
            $query->bindParam(":details", $post->details);
            $query->bindParam(":slug", $slug);
            $query->bindParam(":created", $post->created);
            $query->bindParam(":modified", $post->modified);

            $query->execute();

        }
    }

    public function addTours($tours)
    {
        foreach ($tours as $post) {

            // type gleich
            // continent gleich
            $query = $this->db->pdo->prepare("INSERT INTO tour SET

                type_id = :type_id,
                continent_id = :continent_id,
                title = :title,
                realTitle = :realTitle,
                description = :description,
                start = :start,
                end = :end,
                artistsKeywords = :artistsKeywords,
                live = 1,
                deleted = 0,
                created = :created,
                modified = :modified

            ");

            $query->bindParam(":type_id", $post->type);
            $query->bindParam(":continent_id", $post->continent);
            $query->bindParam(":title", $post->title);
            $query->bindParam(":realTitle", $post->realTitle);
            $query->bindParam(":description", $post->description);
            $query->bindParam(":start", $post->start);
            $query->bindParam(":end", $post->end);
            $query->bindParam(":artistsKeywords", $post->artistsKeywords);
            $query->bindParam(":created", $post->created);
            $query->bindParam(":modified", $post->modified);

            $query->execute();
        }
    }

    public function selectArticles()
    {
        $articles = $this->db->selectOLD(array(
            'table' => 'article'
        ));

        $articleTypes = $this->db->selectOLD(array(
            'table' => 'articletype'
        ));

        $pictures = $this->db->selectOLD(array(
            'table' => 'picture'
        ));

        return array(
            'articles' => $articles,
            'articleTypes' => $articleTypes,
            'pictures' => $pictures,

        );
    }

    public function selectDiscos()
    {
        $discos = $this->db->selectOLD(array(
            'table' => 'disco'
        ));

        $pictures = $this->db->selectOLD(array(
            'table' => 'picture'
        ));

        return array(
            'discos' => $discos,
            'pictures' => $pictures,

        );


    }

    public function selectTours()
    {
        $tours = $this->db->selectOLD(array(
            'table' => 'tour'
        ));

        return $tours;



    }
} 