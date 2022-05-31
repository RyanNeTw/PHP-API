
# API PHP
### For users
##### => /users/list  : For the users list 
##### => /users/create  : To create an account, example 
[{
        "nickname" : String,
        "mail" : String,
        "password" : String}
] 

##### => /users/delete/(\d+)  : To delete an user, replace (\d+) with the id of the user 
##### => /users/update/(\d+)  : To update an user, replace (\d+) with the id of the user, example
[{
        "nickname" : String (255),
        "mail" : String (255),
        "password" : String (255)}
] 
### For tournaments
##### => /tournament/list  : For the tournaments list 
##### => /tournament/create  : To create a tournament, example
[{
        "name" : String (255),
        "bio" : String (255),
        "maxPlayer" : Int}
] 
##### => /tournament/delete/(\d+)  : To delete an tournament, replace (\d+) with the id of the tournament 
##### => /tournament/update/(\d+)  : To update an tournament, replace (\d+) with the id of the tournament, example
[{
        "name" : String (255),
        "bio" : String (255),
        "maxPlayer" : Int}
] 
### To join a tournament
##### => /tournament/join/(\d+)/(\d+) : To join a tournament, replace the first (\d+) with the id of the user and the second (\d+) with the id of the tournament
