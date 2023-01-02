# 为什么我不能启动游戏

请尝试重装系统，如果你修改做LC-CN，请检查参数设置

### 还原JavaAgents

找到\<lc-cn文件夹>\resources\javaagents，删掉里边的所有文件

### 还原参数

关闭启动器，然后找到\<lc-cn文件夹>\resources\app，找到renderer.js，右键选择记事本打开，修改参数部分

改成\`const c\_jvm\_args = \["-server"]\`然后保存即可

### 这些操作我都做完了为什么我还是无法启动

建议重装系统...

