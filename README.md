# Helper Shelter

Repository for the project of group 12 for the LTW's classes.

## Elements

- Davide Castro (201806512)
- Diogo Rosário (201806582)
- Eduardo Correia (201806433)
- Henrique Ribeiro (201806529)

## Credentials

- 👥 ltw2020 🔑 ltw_2020 
- 👥 potato 🔑 potatos_good1

## Features

- **Security**
    - **XSS:** yes
    - **CSRF:** yes (for examples see files: action_change_photo.php, action_edit_post.php, upload.php)
    - **SQL using prepare/execute:** yes
    - **Passwords:** Bcrypt / Salting
    - **Data Validation:** Regex (PHP / HTML / Javascript) 
- **Technologies**
    - **Separated logic/database/presentation:** yes
    - **Semantic HTML tags:** yes
    - **Responsive CSS:** yes
    - **Javascript:** yes
    - **Ajax:** yes
    - **REST API:** yes
- **Usability**:
    - **Error/success messages:** yes
    - **Forms don't lose data on error:** some of them
- **Extra features**:
    - **Rest API**
    - **Notifications**

## Database

[![Database Scheme](Database.png)](https://app.creately.com/diagram/qilCyc2EWYk/edit)

## Navigation

[![Navigation Scheme](Navigation.png)](https://lucid.app/invitations/accept/6660a0dd-ec67-4d0e-b2dc-eb85346cd84a)

## Code Organization

- 📂 **api** - Interface between PHP and HTTP requests, mainly for AJAX 
- 📂 **actions** - PHP form actions
- 📂 **database** - Database queries, connection and storage
- 📂 **images** - Images storage
- 📂 **pages** - FIles that represent the main webpages
- 📂 **scripts** - Javascript scripts
- 📂 **style** - CSS stylesheets
- 📂 **templates** - HTML templates for the webpages to use
    - 📂 **cards** - Card templates
    - 📂 **common** - Common templates
    - 📂 **forms** - Form templates

## Input Verification

### Username

Minimum four characters, maximum 20 characters.

```
ltw2020 ✔️
ltw ❌ 
```

#### Regular expression

`[\w]{3,20}`

### Name 

First and last name, separated by a single space.

```
Eduardo Correia ✔️
EduardoCorreia ❌ 
Eduardo 3 ❌
```

#### Regular expression

`^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)`

### Password

Minimum eight characters, at least one special character, one lowercase/uppercase letter and one number.

```
ltw2020! ✔️
12345678 ❌ 
abc ❌ 
```

#### Regular expression

`^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&\-_])[A-Za-z\d@$!%*#?&\-_]{8,}$`



