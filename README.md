bearded-dangerzone
==================

To install mysql:

``` sudo port install mysql55 ```

``` sudo port install mysql55-server ```

``` sudo port install mysql_select ```

``` sudo port select mysql mysql55 ```

``` sudo port load mysql55 ```

``` sudo port load mysql55-server ```

``` sudo /opt/local/lib/mysql55/bin/mysql_install_db --user=mysql ```

``` sudo /opt/local/lib/mysql55/bin/mysql_secure_installation ```

SQL for creating the table
``` CREATE TABLE responses (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, firstName VARCHAR(255), lastName VARCHAR(255), phone VARCHAR(255), attending BOOLEAN ); ```



