<?php
    namespace APP\Blog\Core;
    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;

    class controller {

        private $loader;
        protected $twig;
        protected $data;

        /**
         * controller constructor.
         */
        public function __construct($page)
        {
            session_start();
            $this->loader = new FilesystemLoader([
                __DIR__.'/../Views',
                __DIR__ . '/../Views/Includes'
            ]);
            $this->twig = new Environment($this->loader);
            $this->data = [];

            if(method_exists($this,$page)){$this->$page();}
            else{
                var_dump(404);
            }
        }
    }