### 关于制作基于laravel composer 业务包的概述
&emsp;&emsp;laravel框架却是最优秀的框架之一，两年使用下来也碰到了很多的问题，特别是但业务系统慢慢变大时，laravel并没有明确指引代码该如何优雅的组织管理。拜读了infoq主编“王概凯”聊聊架构的专栏系列，收益匪浅，对于如何使用laravel框架构建业务系统有了如下愚见。
[参考：如何写好代码](http://www.infoq.com/cn/articles/an-informal-discussion-on-architecture-part08)
#### 代码示例图
![code](http://processon.com/chart_image/59410473e4b0bdefc0571167.png)
这是一个简单模拟下单交易的场景。
在传统MVC三层的基础上，应该在划分出更多的层，如下概述。
##### 服务访问层：
如一个业务软件看做是一个虚拟人，则服务访问层可看成是这个虚拟人所能提供的服务概述。比如包不包含下单、支付、获取历史订单等待。所以服务访问层和实际的业务需求应该是匹配的。
##### 服务管理层：
在业务系统中服务访问层接收用户通过终端（比如web网页）传输的数据，通过DTO对象把数据传递给此服务处理层。在这层根据业务行为方式的不同，又可以分为“服务查询”、“服务处理”（CQRS的思维）。<br/>服务查询：不会对任何实体有变更的行为。服务处理：对不同实体会产生不同变更的行为。
##### 业务逻辑层：
业务逻辑可理解为业务行为，会对业务实体产生变更的行为，例如“下单”、“支付”。所以，业务逻辑负责接收实体对象，业务解析处理，返回实体对象。交服务处理层调用存储对象，保存实体，实现数据的持久化。
##### 存储管理：
这里由两部分组成，实体和仓储，仓储负责实体的持久化存储和源数据的获取。

举例说明“获取订单”、“创建订单”不同的实现方式：
如图：
![code](http://processon.com/chart_image/5954b743e4b08b003f311872.png)
如果把上述“服务接口层”、“服务管理（查询\处理）”不做区分，去除各层通信之间的DTO对象，“业务逻辑”、“存储”、“实体”不做区分，那么这样的代码组织方式就是典型的事务脚本。事务脚本适合前期小型系统快速开发推进。

### 单元测试认知
&emsp;&emsp;之前，对于单元测试的认知一直存在很多困惑。（1）单元测试到底该测试的范围是哪些，是http接口、是数据库查询、还是所有的类（2）单元测试该如何写，只是测试正常业务预期场景，还是要尽可能的覆盖到全部可能会出现的场景。针对这些问题，如果全部做到无疑代码付出和收益是非常不成比例的，所以我一度认为单元测试无用。<br /> 
&emsp;&emsp;如果代码的组织架构分层清晰，业务逻辑没有散落在代码的各个角落里面，那么单元测试只需关注业务逻辑的测试即可。

### 代码说明
&emsp;&emsp;上述composer包是基于laravel包制作的原则，只是按照上述分层思想，添加了一定了约束。<br/>
目录结构说明：<br/>
Business ---- 业务逻辑层<br/>
Config ---- 配置文件<br/>
Contact ---- 服务接口层<br/>
&emsp;&emsp;Dto	---- 数据转实体对象<br/> 
&emsp;&emsp;Facades ---- 供第三方调用的支持facade<br/> 
&emsp;&emsp;Http ---- http协议接口层<br/>
&emsp;&emsp;Listeners ---- 消息监听接收<br/>
&emsp;&emsp;Rules ---- 数据接收验证器<br/>
&emsp;&emsp;Support ---- 供第三方调用的支持class<br/>
&emsp;&emsp;routes.php ---- 路由定义<br/>
Database --- 数据迁移脚本<br/>
Events ---- 事件管理<br/>
Repository ---- 存储管理<br/>
Services ---- 服务管理<br/>
&emsp;&emsp;Manager ---- 处理<br/>
&emsp;&emsp;Query ---- 查询<br/>
##### 导入
&emsp;&emsp; composer require laravelappcomposer/paytest:dev-master
##### 添加服务提供者
&emsp;&emsp; Paytest\PayServiceProvider::class,

##### 友情书籍推荐
[聊聊架构](http://www.infoq.com/cn/news/2017/04/book-talk-architecture)



 




















