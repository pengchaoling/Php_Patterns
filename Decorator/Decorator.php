<?php
/**
 * Author: Lying
 * Data: 2017-02-15
 * description: php装饰器模式
 */

//抽象构件(Component)角色：定义一个对象接口，以规范准备接收附加职责的对象，从而可以给这些对象动态地添加职责。
abstract class Component{
    protected $site;
    abstract public function getSite();
    abstract public function getPrice();
}

//装饰(Decorator)角色：持有一个指向Component对象的指针，并定义一个与Component接口一致的接口。
abstract class Decorator extends Component{
    //这里只是维护Component的引用
    
}

//最原始的类，本来就只有他这个类的
//用户返回基础站点的价格 假设基础性网站的价格是1200元
class BasicSite extends Component{
    protected $site;
    public function __construct(){
        $this->site = "基础型网站";
    }

    public function getSite(){
        return $this->site;
    }

    public function getPrice(){
        return 1200;
    }
}

/*************下面开始给这个基础型网站 增加其他收费项目 维护费用，数据库组件费用，视频组件费用****************/

//具体装饰器，增加维护服务
class Maintenace extends Decorator{
    //构造函数，用户把那个基础型网站的对象传进来
    public function __construct(Component $siteNow){
        $this->site = $siteNow;
    }

    public function getSite(){
        $info = "  维护服务";
        //核心在这里，通过构造函数传进来的对象，这里来获得原始的组件对象
        return $this->site->getSite() . $info;
    }

    public function getPrice(){
        return 950+$this->site->getPrice();
    }
}


//具体装饰器，增加数据库组件  费用是800
class DateBase extends Decorator{
    //构造函数，用户把那个基础型网站的对象传进来
    public function __construct(Component $siteNow){
        $this->site = $siteNow;
    }

    public function getSite(){
        $info = "  数据库组件";
        //核心在这里，通过构造函数传进来的对象，这里来获得原始的组件对象
        return $this->site->getSite() . $info;
    }

    public function getPrice(){
        return 800+$this->site->getPrice();
    }
}


//具体装饰器，增加视频组件  费用是300
class Video extends Decorator{
    //构造函数，用户把那个基础型网站的对象传进来
    public function __construct(Component $siteNow){
        $this->site = $siteNow;
    }

    public function getSite(){
        $info = "  视频组件";
        //核心在这里，通过构造函数传进来的对象，这里来获得原始的组件对象
        return $this->site->getSite() . $info;
    }

    public function getPrice(){
        return 300+$this->site->getPrice();
    }
}


//下面是Client调用
$extend = new BasicSite();
//基础服务费用
echo $extend ->getSite()." 费用：".$extend->getPrice()."<br>"; 
//基础服务+维护服务费用
$extend = new Maintenace($extend);
echo $extend->getSite()." 费用：".$extend->getPrice()."<br>";
//基础服务+维护服务+数据库组件费用
$extend = new DateBase($extend);
echo $extend->getSite()." 费用：".$extend->getPrice()."<br>";
//基础服务+维护服务+数据库组件+视频组件费用
$extend = new Video($extend);
echo $extend->getSite()." 费用：".$extend->getPrice()."<br>";

?>




