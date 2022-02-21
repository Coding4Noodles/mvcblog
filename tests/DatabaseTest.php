<?php
    use PHPUnit\Framework\TestCase;

	require_once  __DIR__."/../app/config/config.php";
	require_once  __DIR__."/../app/libraries/Database.php";
	require_once  __DIR__."/../app/models/Contact.php";

	class DatabaseTest extends TestCase
	{
        private $pdo;

        protected function setUp() : void
        {
            $this->pdo = new Database();
            $this->pdo->beginTransaction();
            $this->pdo->query("CREATE TABLE IF NOT EXISTS `contact` (
                        `Contact_ID` int(11)  NOT NULL AUTO_INCREMENT,
                        `fname` varchar(255) NOT NULL,
                        `email` varchar(255) NOT NULL,
                        PRIMARY KEY (Contact_ID)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
                        $this->pdo->execute();
        }

        public function testInsertQuery()
        {
            $this->pdo->beginTransaction();
            $this->pdo->query("INSERT INTO contact (fname, email) VALUES(:fname, :email)");
                $this->pdo->bind(":fname", "test insert query");
                $this->pdo->bind(":email", "test@hotmail.com");
                $this->pdo->execute();

            $this->assertEquals(1, $this->pdo->rowCount());
        }

        public function testUpdatQuery()
        {
            $this->pdo->beginTransaction();
            $this->pdo->query("UPDATE `contact` SET fname = :fname WHERE Contact_ID = :Contact_ID");
                $this->pdo->bind(":fname", "unit test");
                $this->pdo->bind(":Contact_ID", 1);
                $this->pdo->execute();

            $this->assertEquals(1, $this->pdo->rowCount());
        }

        public function __destruct()
        {
            $this->pdo->beginTransaction();
            $this->pdo->query("DROP TABLE IF EXISTS `contact`");
            $this->pdo->execute();
        }
	}