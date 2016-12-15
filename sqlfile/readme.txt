数据库表结构说明：
explorer 库
|  location 表：存储地理位置，随机生成时使用
----  id 字段：编号
----  lat_lng 字段：经纬度，格式"纬度,经度"，如"46.414602,10.013988"
----  score 字段：这个地图的评分，满分5.0，初始4.0
|  user 表：存储用户信息
----  id 字段：编号
----  username 字段：用户名（登录名）
----  password 字段：密码，sha1加密储存
----  game_count 字段：游戏场次
----  total_score 字段：用户获得的总分
|  motto 表：存储风景名言，随机生成时使用
----  id 字段：编号
----  content 字段：名言的内容
----  author 字段：名言的作者

另注：php实现排行榜时获取信息可按照平均得分来
实现方式
SELECT `id`, `username`, (`total_score` / `game_count`) as `avg_score` FROM `user` order by `avg_score` desc limit 0, 3
