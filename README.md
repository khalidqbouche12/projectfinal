# TestTechniquekhalidqbouche-nextmedia
1 . introduction sur l'application :<br/>
notre application traite la gestion des items , puisque un utilisateur peut ajouter un ou plusieurs items , a condition  , il faut etre authentifier par l'email et le password.  , et aussi permet de visualer tous les items sont existés dans notre systeme, et aussi permet de faire la modification et suppression ses items.<br/><br/>
2 . la conception du notre systeme :<br/>
notre applciation possede deux entités , un entités de 'User' et Item :<br/>
    * Entité User est caractérisé par  : le nom :string, email: string, password.<br/><br/>
    *Entité Item est caractérisé par le titre de type string, image de type string, et la description .<br/>
  remarque : pour la premiere entité User, on peut créer a partir la ligne commande , ç-à-d la commande qui permet de faire l'authentificaiton : "php artisan make:auth" , pusique cette commande permet d'installer le model User dans notre systeme et aussi  permet de bénificier le systeme de l'authenficiation dans notre application ' ajouter les options Login et Enregistrer ' et aussi la migration avec notre base de données .<br/><br/>
3. les fonctions dynamiques de l'utilisateur :<br/>
    comme on a déja dit : un utilisateur peut ajouter un ou plusieurs item, et aussi permet de faire les fonctions globale MAJ (les fonctions de mise-à-jour ), ' ajouter , update, get , delete ' , mais pour la fonction delete , ne peut pas supprimer dans la base de données, mais j'ai utilisé l'option SoftDelete , cette option il est fournit par laravel.<br/>
    le role de l'option softdelete est : <br/>
        * une fois item va supprimer , un champ de type date va activer dans l'entité Item, et pour cela on peut recuperer apres les valeurs .<br/>
    ==> pour faire les fonctions MAJ, l'utilisateur faut etre authentifier par le email et le mot de passe.<br/><br/>
3. les composants de l'application :<br/>
    notre application possede plusieurs interfaces , parmi ces interfaces il y'a : dashboard , ce derniere possede la presentation des items de façon general, et aussi le nom d'utilisateur qui fait l'ajout .<br/>
   3.1- l'interface de register  : c'interface joue le role de l'inscription d'utilisateur .<br/>
   3.2- l'interface de l'authentification : jour le role de l'authentification par email et password .<br/>
   3.3- l'interface d'ajoute Item : c'est une formulaire composée par 3 champs , le titre , image de type file, et la description .
    ... etc .<br/><br/>
4. les commandes en lignes :<br/>
    pour faire l'operation d'addition d'une façon automatique sans passer par une formulaire, et aussi nous avons un ensemble d'utilisateurs comme exemple :100 user, pour ajouter ce nombre , nous allons avoir plus temps pour le faire . donc laravel a une commande s'appelle tinker , permet de faire l'insertion un ensemble des users , par une seul commande :<br/><br/>
   >>  php artisan tinker<br/>
   >>factory(App\User::class, 100)->create()<br/>
   
