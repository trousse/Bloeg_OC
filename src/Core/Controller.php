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
        public function __construct($page,$matchs = [])
        {
            session_start();
            if(!isset($_SESSION['user']) && $page !== 'login' && $page !== 'subscribe'){
                header('Location: /subscribe');
            }

            $this->loader = new FilesystemLoader([
                __DIR__.'/../Views',
                __DIR__ . '/../Views/Includes',
                __DIR__.'/../Views/mail'
            ]);
            $this->twig = new Environment($this->loader);

            $this->data = [];
            $this->data['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : null ;
            $this->data['styles'] = ["main.css"];

            if(method_exists($this,$page)){
                call_user_func_array([$this, $page],$matchs);
            }
            else{
                var_dump(404);
            }
        }
    }