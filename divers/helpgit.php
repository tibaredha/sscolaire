git branch -r


git remote -r
git remote -v

git push origin  develop
git push origin  master

cycle git push  
1-git commit 
2-git push devlop
3-https://github.com/tibaredha/framework
4-creer un new pullrequest
5-master sera ainsi mis ajour 
6-en local passer a master pui faire un pull : master sera mis ajour 
nb git pull = git fech => git merge 

//demarer un depot 
git init
git clone  url

//manipuler fichier
touch *.php
git add *.php git rm *.php 

//visualiser lhistorique
git log 
git log --oneline 
git log -p -2  qui montre les différences introduites entre chaque validation -2 les 02 derniere
git log --stat

// annule une action
git checkout --  nom du fichier annul action est revien a letat initial du fichier   
git reset head  nom du fichier   pour annule le git add .
git commit --amend               pur annuler le commit

//tarvailler avec depot distant
git remote
git remote -v 
git remote show origin
git remote add xxx urlxx
git remote rename xxx  yyy
git remote rm  xxx
git fetch xxx
git push origin master
git pull

//tag
git tag 

//configuration
git config --global user.name "John Doe"
git config --global user.email johndoe@example.com
git config --global alias.co checkout
git config --list


//branch
git branch liste les branches existatntes
git branch -v
git branch test
git checkout test   Cela déplace HEAD pour le faire pointer vers la branche test 
git checkout master HEAD se déplace sur une autre branche lors d'un checkout
git branch -b test = git branch test=>git checkout test (racourci)  
git commit -a -m "maj"

//fusionnement
1er facon avec merge
git checkout master
git merge test  Git crée un nouvel instantané qui résulte de la fusion à trois branches et crée automatiquement un nouveau commit qui pointe dessus
git branch -d test ou  git branch -D test
2eme facon avec rebase prenez toutes les modifications qui ont été validées sur une branche et vous les rejouez sur une autre. 
git checkout test
git rebase master



1-protocole 
git remote add proj_local /opt/git/projet.git
git clone /opt/git/projet.git   git clone file:///opt/git/projet.git

2-protocole
git clone ssh://utilisateur@serveur/projet.git     git clone  utilisateur@serveur:projet.git = git@github.com:tibaredha/framework.git

3-protocol git ???

4-protocole HTTP/S
git clone --bare  
git clone http://exemple.com/projetgit.git    https://github.com/tibaredha/framework.git   












