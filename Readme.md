**背景**：学习基础的php知识 

**学习资源**: https://laracasts.com/series/php-for-beginners-2023-edition

- [问题](#问题)
    - [tailwind的提示无法在php文件中使用](#tailwind的提示无法在php文件中使用)
- [Lessons](#lessons)
    - [Environments and Configuration](#environments-and-configuration)
    - [SQL Injection Vulnerabilities Explained](#sql-injection-vulnerabilities-explained)
    - [Notes: mini project](#notes-mini-project)



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

#### Notes: mini project 
- [x] 数据库建表
```js
// 表的结构
notes: id body
users: id name email(唯一值) 
```
  - [x] 建立user和notes表，以及关联外键(user删除时同时删除相关notes)
- [x] 渲染出notes page
  - [x] 创建并添加notes路由(router.php)
  - [x] 添加notes页面
  - [x] 连接从数据库中拿到数据
  - [x] 在view中渲染拿到的数据
  - [x] 每条内容能够点击跳转详情note
  - [x] 渲染note详情页
- [x] 身份校验&状态码
  - [x] 实现404和403状态码页面:处理note不存在&note不属于当前用户的情况
  - [x] 建立状态码文件用于全局使用 
  - [x] 重构
    - [x] 将fetch和abort的代码整合在一起，当没有数据时就自动abort
    ```php
      <!-- before -->
      $note = $db->query('select * from notes where id = :id', ['id' => $_GET["id"]])->fetchOrAbort();

      if (! $note) {
          abort();
      }
      <!--after-->
      $note = $db->query('select * from notes where id = :id', ['id' => $_GET["id"]])->fetchAndAbort(); //这个写法有点像promise；返回其自身
    ```
    - [x] 将校验的逻辑封装成一个函数，通过传参的形式来获取判断条件
    ```php
    <!-- before -->
    if ($note['user_id'] !== $currentUserId) {
        abort(Response::FORBIDDEN);
    }
    <!-- after -->
    authorize($note['user_id'] !== $currentUserId);
    ```
- [] 实现新增note
  - [x] 在notes页添加一个新建按钮用于跳转至创建页面
  - [x] 并将routes从router中抽离到单独的文件
  - [x] 新增create页面
    - [x] 添加表单,实现上传表单发送post请求
    - [x] 判断是否为post请求，并将传的参数打印出来
    ```php
    $method = $_SERVER['REQUEST_METHOD'] //判断请求方式
    $params = $_POST
    ```
    - [x] 使用tailwind官网提供的现成的表单
    - [x] 将输入的内容插入数据库中
    - [x] 处理可能出现的恶意攻击(输入的内容包含script可能会影响整个网站的运行)
    ```
    解决方案：
    使用类似htmlspecialchars去进行转义，防止浏览器当作标签或者脚本处理
    ```
  - [ ] 添加表单校验
    - [ ] 必填校验
      - [ ] 用户端(可以直接通过加required字段来判断)
      - [ ] 服务端(判断传的值是否为空，为空则提示报错信息)
    - [ ] 长度校验
    - [ ] 校验报错不清空数据