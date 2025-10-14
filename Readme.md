**背景**：学习基础的php知识 

**学习资源**: https://laracasts.com/series/php-for-beginners-2023-edition

- [问题](#问题)
    - [tailwind的提示无法在php文件中使用](#tailwind的提示无法在php文件中使用)
- [Lessons](#lessons)
    - [Environments and Configuration](#environments-and-configuration)
    - [SQL Injection Vulnerabilities Explained](#sql-injection-vulnerabilities-explained)



## 问题

#### tailwind的提示无法在php文件中使用
```js
原因：没有config配置文件,添加一个tailwind.config.js就行了
参考:https://stackoverflow.com/questions/69327331/vscode-tailwind-css-intellisense-not-working
//空文件就行
module.exports = {}
```


## Lessons

#### Environments and Configuration

- [x] 数据库访问默认值设置默认获取关系型数组
```php
        $this->connection = new PDO($dsn,$username,$password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
```
- [x] 硬编码的值改成动态传入
- [x] 定义的配置变量放置在配置文件中

#### SQL Injection Vulnerabilities Explained
- [x] 获取url上的query,实现动态查询数据
 ```php
$id = $_GET['id'];
$query = "select * from where id ={$id}"
//  虽然可以获取到id，但是用户可以在这个id上编写下述代码来攻击数据库
//  localhost:8888/?id=1;drop table users;

 ```
- [x] 禁止内联变量在sql语句中,在execute中bind参数
```php
$statement->execute($params)
```