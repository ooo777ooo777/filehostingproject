# filehostingproject

Filehosting projekt (täielikult algajalt). Kogu info tutorialitest, stackoverflow, google jne. 

Samm | Staatus |
| ----------- | ----------- |
| registreerimine | valmis, aga peab kontrollima sql inj |
| login | valmis, aga peab kontrollima sql inj |
| file upload | valmis, aga peab ka turvalisust põhjalikult kontrollima. |
| file list | praegune TODO |
| file download | teha peale file listi |
| file delete | teha peale file listi |

| Probleem | Kirjeldus |
| ----------- | ----------- |
| struktuur | peab uurima kuidas .php faile hoida, kas lihtsalt ühes kaustas segamini või saab kuidagi paremini |
| docker | et lõpuks kogu asi ühte dockerfile panna, peab selle kohta uurima (0 kogemust) |
| xampp | localhostil praegu läbi [XAMPP](https://www.apachefriends.org/) jooksevad Apache ja MySQL, peab uurima kuidas nad Dockeriga ühilduvad jne.|
| mysql | praegu tegin manuaalselt PHPMyAdmin'is andmebaasi kasutajatele, peab uurima kas seda saab hilisemalt automatiseerida |
| ajax/fetch | uurida mis see on ja kus seda enda projektis kasutada võiks |

| Fail | Sisu |
| ----------- | ----------- |
| /uploadedfiles | kaust, kuhu praegu jõuavad üles laetud failid |
| /css/styles.css | 25a vana css |
| index.php | login ja register |
| home.php | "dashboard" kuhu viin kasutaja peale sisenemist |
| login.php | DB connect, login |
| register.php | DB connect, registreerimine |
| fileupload.php | faili valimine, mida uploadida |
| uploader.php | fail mis kontrollib basic asju (kas ikka on fail valitud, ega ta pole tühi, mis extension jne.) ning siis liigutab temp kaustast /uploadedfiles'isse |
| filelist.php | praegune TODO, siia peaks listima kõik failid õigete andmetega, koos nuppudega kustutamiseks jne. |
| logout.php | kustutab sessiooni ja viib kasutaja index.php peale |

PHPMyAdmin'i MySQL manuaalselt tehtud:
(arenduseks kasutaja login:pass - test:test)
 ```
 CREATE TABLE IF NOT EXISTS `accounts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(50) NOT NULL,
  	`password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `accounts` (`id`, `username`, `password`) VALUES (1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa');
 ```