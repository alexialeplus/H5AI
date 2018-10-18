<?php
/**
 * Created by PhpStorm.
 * User: Alexi
 * Date: 07/02/2018
 * Time: 10:10
 */

class Filelist
{
    private $smarty;
    private $path;
    private $result;
    private $imgPath;
    private $url;
    private $localhost;
    private $root;

    public function __construct()
    {

        $this->smarty = new Smarty();
        $this->imgPath = 'http://' . $_SERVER['HTTP_HOST'] . '/my_h5ai/img/';
        $this->localhost = 'http://' . $_SERVER['HTTP_HOST'] . '/';

        if (is_string($_SERVER['REQUEST_URI']) && is_dir($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI']))
        {
            $this->path = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'];
            $this->url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

            $this->root = explode('/', $_SERVER['REQUEST_URI']);
            $this->root = array_filter($this->root);
            $this->root = $_SERVER['DOCUMENT_ROOT'] . '/' . $this->root[1] . '/';

            $this->show();
        }
    }

    //Get the content of the given path and assign it to the template
    public function show()
    {

        $folders = $this->listFolders($this->root);
        $files = $this->listFiles($this->path);
        $entirePath = $this->getEntirePath();

        $this->smarty->assign(array(
                        'listFolders' => $folders,
                        'listFiles' => $files,
                        'path' => $entirePath,
                        )
        );
        $this->smarty->display('../views/main.html');
    }

    //Return all the folders of the given url
    public function listFolders($content)
    {
        $actualContent = scandir($content);

        foreach ($actualContent as $key => $file)
        {
            $path = "";

            if (is_string($file) && $file !== '..' && $file !== '.')
            {

                if (is_dir($content . $file))
                {
                    $path = str_replace($_SERVER['DOCUMENT_ROOT'], 'http://' . $_SERVER['HTTP_HOST'], $content);
                    $path = $path . $file;

                    $this->result .= '<ul>';
                    $this->result .= "<li><img src='" . $this->addLogo('folder') . "' alt='icone fichier'/>
                                        <a href='" . $path . "'>" . $file . '</a></li>';
                    $this->listFolders($content . $file . '/');
                    $this->result .= '</ul>';
                }
            }
        }

         return $this->result;
    }

    //Return all the folders of the given url
    public function listFiles($content)
    {
        $actualContent = scandir($content);
        $resultFiles = '<ul>';

        foreach ($actualContent as $file)
        {
            if (is_string($file) && $file !== '..' && $file !== '.')
            {
                if (is_file($content . $file))
                {
                    $info = $this->getInfo($file);
                    $resultFiles .= "<li class='row'><span class='col-6 name'><img src='" . $this->addLogo($info['ext']) . "' alt='icone fichier'/>" . $file . "</span><span class='date col-3'> " . $info['date'] . " </span><span class='size col-2'> " . $info['size'] . " octets </span></li>";
                }
                elseif (is_dir($content . $file))
                {
                    $resultFiles .= "<li><img src='" . $this->addLogo('folder') . "' alt='icone fichier'/>
                                        <a href='" . $this->url . $file . "'>" . $file . '</a></li>';
                }

            }
        }

        $resultFiles .= '</ul>';

        return $resultFiles;
    }

    //Add the icon according to file' type
    public function addLogo($type)
    {
        switch ($type)
        {
            case 'folder':
                return $this->imgPath . "folder.svg";
                break;
            case 'mp3':
            case 'mp4':
                return $this->imgPath . "vid.svg";
                break;
            case 'ico':
            case 'gif':
            case 'bmp':
            case 'jpg':
            case 'jpeg':
            case 'svg':
            case 'png':
                return $this->imgPath . "img.svg";
                break;
            case 'txt':
                return $this->imgPath . "txt.svg";
                break;
            case 'pdf':
                return $this->imgPath . "pdf.svg";
                break;
            default:
                return $this->imgPath . "file.svg";
                break;
        }
    }

    //Get file' extension, last modification date and size
    public function getInfo($file)
    {
        $info = array();

        $info['ext'] = pathinfo($file, PATHINFO_EXTENSION);
        $info['date'] = date('d/m/Y H:i', filemtime($this->path . '/' . $file));
        $info['size'] = filesize($this->path . '/' . $file);

        return $info;
    }

    //Get the path of each parent folder
    public function getEntirePath()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_pop($uri);
        array_shift($uri);

        $pathFolders = array();

        for ($y = count($uri) - 1; $y > 0; $y--)
        {
            $path = "";

            for ($i = 0; $i <= $y; $i++)
            {
                $path .= $uri[$i] . '/';
            }

            $pathFolders[$uri[$y]] = $this->localhost . $path;
        }

        $pathFolders[$uri[0]] = $this->localhost . $uri[0];

        return array_reverse($pathFolders);
    }
}