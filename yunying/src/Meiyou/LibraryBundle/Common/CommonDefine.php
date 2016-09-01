<?php
namespace Fcx\LibraryBundle\Common;


class CommonDefine
{
        // 数据的状态：0：删除；1：正常；
	const DATA_STATUS_DELETE=0;
	const DATA_STATUS_NORMAL=1;
        
        // 数据锁
	const DATA_LOCK = 1;
	const DATA_UNLOCK = 0;
	
	const SPLIT_WORD="@";
	
        // 是否过滤
        const IS_FILTER = 1;
        
        // 语种
        const CHINA = 'cn';
        const ENGLISH = 'en';
        
        // 注册类型为手机注册
        const REGISTER_TYPE_PHONE = 1;
        
        // 限制发送短信次数
        const LIMIT_SEND_SMS_TIMES = 6;
        // 刷新SMS当天使用次数为0
        const REFRESH_SMS_TODAYCOUNT = 0;
        
        // 注册来源
        const REGISTER_FROM_PC_WEB = 1;// pcweb
        
        // 支付账号类型
        const PAY_ACCOUNT_UNKNOWN = 0;// 未知
        const PAY_ACCOUNT_ALIPAY = 1;// 支付宝
        const PAY_ACCOUNT_BANK = 2;// 银行
        const PAY_ACCOUNT_WEIXIN = 3;// 微信支付
        
        // 是否为父节点
        const IS_PARENT_NO = 0;// 否
        const IS_PARENT_YES = 1;// 是
        
        // 新楼盘图片类型
        const NEW_HOUSE_IMG_SCENE = 1;// 实景图
        const NEW_HOUSE_IMG_COVER = 2;// 封面图
        
        // 审核状态
        const VERIFY_STATUS_ING = 0;// 待审核
        const VERIFY_STATUS_YES = 1;// 已通过
        const VERIFY_STATUS_NO = 2;// 已拒绝
        const VERIFY_STATUS_AGAIN = 3;// 待审核(再次提交审核)
        
        // 团购报名状态
        const GROUP_BUY_STATUS_ED = 0;// 已过期
        const GROUP_BUY_STATUS_SIGN = 1;// 已报名未购买
        const GROUP_BUY_STATUS_YES = 2;// 已购买
        const GROUP_BUY_STATUS_NO = 3;// 未购买
        
        // 申请状态
        const APPLY_STATUS_NO_SIGN_UP = 0;// 未报名
        const APPLY_STATUS_YES_SIGN_UP = 1;// 提出申请
        const APPLY_STATUS_YES = 2;// 申请通过
        const APPLY_STATUS_NO = 3;// 申请未通过
        
        // 会员状态
        const MEMBER_TYPE_NORMAL = 0;// 普通会员
        const MEMBER_TYPE_AGENT = 2;// 经纪人
        const MEMBER_TYPE_COMPANY = 3;// 公司
        
        // 现金流水类型
        const CASH_BLOTTER_TYPE_PAY = 1;// 支付
        const CASH_BLOTTER_TYPE_INCOME = 2;// 收入
        const CASH_BLOTTER_TYPE_WITHDRAW = 3;// 提现
        const CASH_BLOTTER_TYPE_RECHANGE = 4;// 充值
        const CASH_BLOTTER_TYPE_REFUND = 5;// 退款
        
        
        // 红包类型
        const RED_PACKET_TYPE_BUY_HOUSE = 1;// 购房红包
        
        
        // 类型
        const TYPE_WECHAT = 1;// 微信
        const TYPE_ALIPAY = 2;// 支付宝
        
        // 微信订单交易状态
        const WECHAT_TRADE_UNKNOWN = 0;// 未知
        const WECHAT_TRADE_ING = 1;// 进行中
        const WECHAT_TRADE_CLOSE = 2;// 已关闭
        const WECHAT_TRADE_SUCCESS = 3;// 已成功
        
}
?>