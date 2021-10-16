<?php
    namespace APP\Blog\Core;
    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;

    class controller {

        private $loader;
        protected $twig;

        /**
         * controller constructor.
         */
        public function __construct()
        {
            session_start();
            $this->loader = new FilesystemLoader([
                __DIR__.'/../Views',
                __DIR__ . '/../Views/Includes'
            ]);
            $this->twig = new Environment($this->loader);
        }
    }