<?php
    //include_once("safe.php");
    include_once("config.php");

    function get_ranklist($count) {
        $sql =
<<<sql
SELECT
    `username`,
    `game_count`,
    `total_score`,
    if(`game_count`>0, CONVERT(`total_score`/`game_count`, SIGNED), 0)
      as `avg_score`
FROM
    `user`
ORDER BY
    `avg_score` DESC
LIMIT 0,
sql;
        $sql .= $count;
        $res = mysql_query($sql);
        $rank_cnt = 1;
        $ret = '';
        while($marr = mysql_fetch_assoc($res)) {
    			$marr['rank'] = $rank_cnt;
          $ret .= file_rep_contents("assets/model/rank_table.html", $marr);
          $rank_cnt += 1;
    		}
        return $ret;
    }

    function get_user_rank($user) {
      $sql =
<<<sql
      SELECT
        COUNT(*) AS rank
      FROM
        user
      WHERE
        if(`game_count`>0, CONVERT(`total_score`/`game_count`, SIGNED), 0) >=
          (SELECT
            if(`game_count`>0, CONVERT(`total_score`/`game_count`, SIGNED), 0)
              as `avg_score`
           FROM
            user
           WHERE
            username=
sql;
      $sql .= "'".$user."')";
      $res = mysql_query($sql);
      $rank = mysql_fetch_array($res);
      return $rank['rank'];
    }

    function get_user_data($user) {
      $sql =
<<<sql
      SELECT
        `username`,
        `game_count`,
        `total_score`,
        if(`game_count`>0, CONVERT(`total_score`/`game_count`, SIGNED), 0)
          as `avg_score`
      FROM `user`
      WHERE username =
sql;
      $sql .= "'".$user."'";
      $res = mysql_query($sql);
      $user_data = mysql_fetch_array($res);
      $user_data['rank'] = get_user_rank($user);
      return $user_data;
    }

    $head = file_get_contents("assets/model/head.html");

    /* draw loader */
    $body = file_get_contents("assets/model/loader.html");

    /* draw top menu */
    $login_bar = "";
    if($_SESSION['username'] == ''){
      $login_bar = file_get_contents("assets/model/dropdown_login.html");
    } else {
      $login_bar = "<li><a id=\"logout_a\"  href=\"#\">注销</a></li>";
    }
    $top_menu_data = array('login_bar' => $login_bar);
    $body .= file_rep_contents("assets/model/top_menu.html", $top_menu_data);

    /* draw page title */
    $body .= file_get_contents("assets/model/page_title.html");
    $body .= file_get_contents("assets/model/meet_world.html");

    /* draw user counter */
    $arr = array('username' => "你");
    if($_SESSION['username'] == ''){
        $arr['unlogin'] = "<p>无论你是否只是偶然经过<br/>登陆此处之后<br/>便可见到我们为你记录的足迹</p>";
        $body .= file_rep_contents("assets/model/user_counter.html", $arr);
    } else {
        $counter_data = get_user_data($_SESSION['username']);
        $arr['username'] = $_SESSION['username'];
        $arr['counter'] = file_rep_contents("assets/model/user_counter_2.html", $counter_data);
        $body .= file_rep_contents("assets/model/user_counter.html", $arr);
    }

    /* draw ranklist */
    $body .= file_rep_contents("assets/model/rank.html", array('ranklist' => get_ranklist(7)));

    /* draw motto */
    $sql = "select * from motto order by rand() limit 1";
    $res = mysql_query($sql);
    $our_motto_data = mysql_fetch_array($res);
    $body .= file_rep_contents("assets/model/our_motto.html", $our_motto_data);

    $body .= file_get_contents("assets/model/about_us.html");
    $body .= file_get_contents("assets/model/contact_us.html");
    $body .= file_get_contents("assets/model/footer.html");
    $body .= file_get_contents("assets/model/index_js.html");

    $html_data = array('head' => $head, 'body' => $body);
    echo file_rep_contents("assets/model/html.html", $html_data);
?>
