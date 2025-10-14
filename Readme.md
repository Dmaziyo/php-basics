**背景**：学习基础的php知识 

**学习资源**: https://laracasts.com/series/php-for-beginners-2023-edition

- [问题](#问题)
    - [tailwind的提示无法在php文件中使用](#tailwind的提示无法在php文件中使用)
- [Lessons](#lessons)
    - [Environments and Configuration](#environments-and-configuration)



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
