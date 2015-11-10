@extends('admin.layout')

@section('title', '人才列表')

@section('head-assets')
<script type="text/javascript">
</script>
@stop

@section('content')
<div class="am-cf am-padding border-bottom">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">人才信息</strong> / <small>人才列表</small></div>
</div>
<div class="am-g">
    <div class="am-u-sm-12">
        <!--表单内容 start-->
        <h3 class="yahei">
            人才基本信息表
        </h3>
        <!--更改内容 start-->
        <div class="width70">
          <form class="am-form am-form-horizontal">
              <div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
                <label  class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">姓名:</label>
                <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
                  <input type="text"  placeholder="输入你的姓名"/>
              </div>
          </div>
          <div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
            <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label"> 性别:</label>
            <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">

                <label class="am-radio-inline">
                    <input type="radio" name="docInlineRadio"/>
                    男
                </label>
                <label class="am-radio-inline">
                    <input type="radio" name="docInlineRadio"/>
                    女
                </label>
            </div>
        </div>

        <div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-12">
            <label  class="am-u-sm-5 am-u-md-4  am-u-lg-2 am-form-label">国籍:</label>
            <div class="am-u-sm-10 am-u-md-8 am-u-lg-10 leftmargin">
              <input type="text"  placeholder="中国大陆"/>
          </div>
      </div>


      <div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
        <label  class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">民族:</label>
        <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
          <select id="doc-select-1">
            <option value="option1">
                阿昌族
            </option>
            <option value="option2">
                鄂温克族
            </option>
            <option value="option3">
                傈僳族
            </option>
            <option value="option1">
                水族
            </option>
            <option value="option2">
                白族
            </option>
            <option value="option3">
                高山族
            </option>
            <option value="option1">
                珞巴族
            </option>
            <option value="option2">
                塔吉克族
            </option>
            <option value="option3">
                保安族
            </option>
            <option value="option1">
                仡佬族
            </option>
            <option value="option2">
                满族
            </option>
            <option value="option3">
                布朗族
            </option>
            <option value="option1">
                哈尼族
            </option>
            <option value="option2">
                毛南族
            </option>
            <option value="option3">
                土家族
            </option>
            <option value="option1">
                布依族
            </option>
            <option value="option2">
                哈萨克族
            </option>
            <option value="option3">
                门巴族
            </option>
            <option value="option1">
                土族
            </option>
            <option value="option2">
                朝鲜族
            </option>
            <option value="option3">
                汉族
            </option>
            <option value="option1">
                蒙古族
            </option>
            <option value="option2">
                佤族
            </option>
            <option value="option3">
                达斡尔族
            </option>
            <option value="option1">
                赫哲族
            </option>
            <option value="option2">
                苗族
            </option>
            <option value="option3">
                维吾尔族
            </option>
            <option value="option1">
                傣族
            </option>
            <option value="option2">
                回族
            </option>
            <option value="option3">
                仫佬族
            </option>
            <option value="option1">
                乌孜别克族
            </option>
            <option value="option2">
                德昂族
            </option>
            <option value="option3">
                基诺族
            </option>
            <option value="option3">
                纳西族
            </option>
            <option value="option1">
                锡伯族
            </option>
            <option value="option2">
                东乡族
            </option>
            <option value="option3">
                京族
            </option>
            <option value="option2">
                怒族
            </option>
            <option value="option3">
                瑶族
            </option>
            <option value="option3">
                侗族
            </option>
            <option value="option1">
                景颇族
            </option>
            <option value="option2">
                普米族
            </option>
            <option value="option3">
                彝族
            </option>
            <option value="option3">
                独龙族
            </option>
            <option value="option3">
                柯尔克孜族
            </option>
            <option value="option1">
                羌族
            </option>
            <option value="option2">
                裕固族
            </option>
            <option value="option3">
                俄罗斯族
            </option>
            <option value="option3">
                拉祜族
            </option>
            <option value="option1">
                撒拉族
            </option>
            <option value="option2">
                藏族
            </option>
            <option value="option3">
                鄂伦春族
            </option>
            <option value="option3">
                黎族
            </option>
            <option value="option3">
                畲族
            </option>
            <option value="option3">
                壮族
            </option>
        </select>
        <span class="am-form-caret">
        </span>
    </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">籍贯:</label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text" id="doc-ipt-3" placeholder="中国大陆">
  </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">户口所在地:</label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text" id="doc-ipt-3" placeholder="中国大陆">
  </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">职称:</label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text" id="doc-ipt-3" placeholder="教师">
  </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
  <label  class="am-u-sm-5 am-u-md-4  am-u-lg-4  am-form-label">出生日期:</label>
  <div class="am-form-group am-form-icon am-u-sm-7 am-u-md-8 am-u-lg-8">
    <i class="am-icon-calendar position-move"></i>
    <input type="text" class="am-form-field" placeholder="日期">
</div>
</div> 

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-12">
    <label for="doc-ipt-experience" class="am-u-sm-5 am-u-md-4  am-u-lg-2 am-form-label">
        工作经验:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-10 leftmargin">
        <textarea rows="5" id="doc-ipt-experience">
        </textarea>
    </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label for="doc-ipt-experience" class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        婚姻状况:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
        <label class="am-radio-inline">
            <input type="radio" name="married">
            已婚
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="married">
            未婚
        </label>
    </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-12">
    <label for="doc-ipt-experience" class="am-u-sm-5 am-u-md-4  am-u-lg-2 am-form-label">
        政治面貌:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-10">
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            中共党员 　　
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            中共预备党员
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            共青团员 　　
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            民革党员
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            民盟盟员
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            民建会员
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            民进会员
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            农工党党员
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            致公党党员
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            九三学社社员
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            台盟盟员
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            无党派民主人士
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="communist">
            群众（现称普通公民）
        </label>
    </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label for="doc-ipt-experience" class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        最高学历:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text" placeholder="硕士">
  </div>
</div>
<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label  class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        联系电话:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text" placeholder="联系电话">
  </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        手机号码:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="tel"  placeholder="手机号码">
  </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        E_mail:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="email"   placeholder="手机号码">
  </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6 ">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        联系地址:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"   placeholder="联系地址">
  </div>
</div>
<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6 ">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        专业领域:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"   placeholder="联系地址">
  </div>
</div>



<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        毕业学校1:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"   placeholder="毕业学校">
  </div>
</div>
<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        毕业学校1:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"   placeholder="毕业学校">
  </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        毕业学校2:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"   placeholder="毕业学校">
  </div>
</div>
<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        毕业学校2:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"   placeholder="毕业学校">
  </div>
</div>


<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        毕业学校3:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"   placeholder="毕业学校">
  </div>
</div>
<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        毕业学校3:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"   placeholder="毕业学校">
  </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        专业领域:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"   placeholder="专业领域">
  </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-12">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-2 am-form-label">
        是否海归:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-10 leftmargin">

        <label class="am-radio-inline">
            <input type="radio" name="docInlineRadio">
            是
        </label>
        <label class="am-radio-inline">
            <input type="radio" name="docInlineRadio">
            否
        </label>
    </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        回国前单位:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text" class="" id="doc-ipt-company" placeholder="回国前单位">
  </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        职务/职称:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"  placeholder="职务/职称">
  </div>
</div>

<div class="am-form-group am-u-lg-12">
    <label >
        用人单位/创办企业（项目）:
    </label>
    <div class="am-u-lg-10 am-u-lg-offset-2 leftmargin">
        <input type="text" placeholder="用人单位/创办企业（项目）">
    </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        人才分类:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <select id="doc-select-1">
        <option value="option1">
            选项一...
        </option>
        <option value="option2">
            选项二.....
        </option>
        <option value="option3">
            选项三........
        </option>
    </select>
    <span class="am-form-caret">
    </span>
</div>
</div>





<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        人才类型:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <select id="doc-select-1">
        <option value="option1">
            选项一...
        </option>
        <option value="option2">
            选项二.....
        </option>
        <option value="option3">
            选项三........
        </option>
    </select>
    <span class="am-form-caret">
    </span>
</div>
</div>

<div class="width60">
    <div class="am-form-group">
        <div class="am-u-md-6 am-u-sm-12 centers">
            <button type="submit" class="am-btn am-btn-default am-btn-primary paddinglr">
                确认提交
            </button>
        </div>
        <div class="am-u-md-6 am-u-sm-12 centers">
            <button type="submit" class="am-btn am-btn-default paddinglr">
                取消提交
            </button>
        </div>
    </div>
    <div class="clearfolt">
    </div>
    <br>
    <br>
</div>
</form>
</div>
<!--更改内容 end-->





<h3 class="yahei">
    人才经历信息
</h3>
<div class="width70">
  <form class="am-form am-form-horizontal">

     <div class="am-form-group am-u-lg-12">
        <label >
            人才经历类型:
        </label>
        <div class="am-u-lg-10 am-u-lg-offset-2 leftmargin">
           <select id="doc-ipt-types">
            <option value="option1">
                开创型人才
            </option>
            <option value="option2">
                经验型人才
            </option>
            <option value="option3">
                开始年月
            </option>
            <option value="option2">
                结束年月
            </option>
            <option value="option3">
                单位
            </option>
            <option value="option3">
                内容
            </option>
        </select>
        <span class="am-form-caret">
        </span>
    </div>
</div>
<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-12">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-2 am-form-label">
     时间:
 </label>
 <div class="am-u-sm-7 am-u-md-8 am-u-lg-10 leftmargin">
  <label class="am-select-inline">
    <select>
        <option value="option1">
            2015年&nbsp;
        </option>
        <option value="option2">
            2016年
        </option>
        <option value="option3">
            2017年
        </option>
        <option value="option2">
            2018年
        </option>
        <option value="option3">
            2019年
        </option>
        <option value="option3">
            2015年
        </option>
    </select>
</label>
<label class="am-select-inline">
    <select id="doc-select-1">
        <option value="option1">
            2015年&nbsp;
        </option>
        <option value="option2">
            2016年
        </option>
        <option value="option3">
            2017年
        </option>
        <option value="option2">
            2018年
        </option>
        <option value="option3">
            2019年
        </option>
        <option value="option3">
            2015年
        </option>
    </select>
</label>
到
<label class="am-select-inline">
    <select id="doc-select-1">
        <option value="option1">
            2015年&nbsp;
        </option>
        <option value="option2">
            2016年
        </option>
        <option value="option3">
            2017年
        </option>
        <option value="option2">
            2018年
        </option>
        <option value="option3">
            2019年
        </option>
        <option value="option3">
            2015年
        </option>
    </select>
</label>
<label class="am-select-inline">
    <select id="doc-select-1">
        <option value="option1">
            2015年&nbsp;
        </option>
        <option value="option2">
            2016年
        </option>
        <option value="option3">
            2017年
        </option>
        <option value="option2">
            2018年
        </option>
        <option value="option3">
            2019年
        </option>
        <option value="option3">
            2015年
        </option>
    </select>
</label>
</div>
</div>
<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        单位:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"  placeholder="单位">
  </div>
</div>

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-12">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-2 am-form-label">
        内容:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-10 leftmargin">
     <textarea rows="5" id="doc-ipt-content">
     </textarea>
 </div>
</div>
<div class="width60">
    <div class="am-form-group">
        <div class="am-u-md-6 am-u-sm-12 centers">
            <button type="submit" class="am-btn am-btn-default am-btn-primary paddinglr">
                确认提交
            </button>
        </div>
        <div class="am-u-md-6 am-u-sm-12 centers">
            <button type="submit" class="am-btn am-btn-default paddinglr">
                取消提交
            </button>
        </div>
    </div>
    <div class="clearfolt">
    </div>
    <br>
    <br>
</div>
</form>
</div>



<!--人才评定信息 start-->
<div class="clearfolt">
</div>
<h3 class="yahei">
    人才评定信息
</h3>
<div class="width70">
  <form class="am-form am-form-horizontal">
   <div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
      <label  class="am-u-sm-5 am-u-md-4  am-u-lg-4  am-form-label">评定年月:</label>
      <div class="am-form-group am-form-icon am-u-sm-7 am-u-md-8 am-u-lg-8">
        <i class="am-icon-calendar position-move"></i>
        <input type="text" class="am-form-field" placeholder="日期">
    </div>
</div> 

<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-6">
    <label class="am-u-sm-5 am-u-md-4  am-u-lg-4 am-form-label">
        批次:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-8">
      <input type="text"  placeholder="批次">
  </div>
</div> 
<div class="am-form-group am-u-md-12 am-u-sm-12 am-u-lg-12">
    <label for="doc-ipt-experience" class="am-u-sm-5 am-u-md-4  am-u-lg-2 am-form-label">
        评定结果:
    </label>
    <div class="am-u-sm-7 am-u-md-8 am-u-lg-10 leftmargin">
        <textarea rows="5" id="doc-ipt-experience">
        </textarea>
    </div>
</div>

<div class="am-form-group am-u-lg-12">
    <label >
        人才经历类型:
    </label>
    <div class="am-u-lg-10 am-u-lg-offset-2 leftmargin">
       <select id="doc-ipt-types">
        <option value="option1">
            开创型人才
        </option>
        <option value="option2">
            经验型人才
        </option>
        <option value="option3">
            开始年月
        </option>
        <option value="option2">
            结束年月
        </option>
        <option value="option3">
            单位
        </option>
        <option value="option3">
            内容
        </option>
    </select>
    <span class="am-form-caret">
    </span>
</div>
</div>


</form>
</div>


<form class="am-form">
    <div class="width60">
        <div class="am-form-group am-form-icon am-u-md-6">
            <label for="doc-ipt-evaluation">
                评定年月:
            </label>
            <i class="am-icon-calendar rightremove">
            </i>
            <input type="text" id="doc-ipt-evaluation" class="am-form-field" placeholder="日期">
        </div>
        <div class="am-form-group  am-u-md-4">
            <label for="doc-ipt-batch">
                批次:
            </label>
            <input type="text" id="doc-ipt-batch" class="am-form-field" placeholder="批次">
        </div>
        <div class="am-u-offset-2">
        </div>
        <div class="clearfolt">
        </div>
        <div class="am-form-group am-u-md-12">
            <label for="doc-ipt-results">
                评定结果
            </label>
            <textarea rows="5" id="doc-ipt-results">
            </textarea>
        </div>
        <div class="clearfolt">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-6">
            <label>
                人才分类
            </label>
            <select id="doc-select-talents">
                <option value="option1">
                    选项一...
                </option>
                <option value="option2">
                    选项二.....
                </option>
                <option value="option3">
                    选项三........
                </option>
            </select>
            <span class="am-form-caret">
            </span>
        </div>
        <div class="am-form-group  am-u-sm-12 am-u-md-6">
            <label>
                人才类型
            </label>
            <select id="doc-select-talentlist">
                <option value="option1">
                    选项一...
                </option>
                <option value="option2">
                    选项二.....
                </option>
                <option value="option3">
                    选项三........
                </option>
            </select>
            <span class="am-form-caret">
            </span>
        </div>
        <div class="clearfolt">
            <div class="am-form-group am-u-md-12">
                <label for="doc-ipt-introduction">
                    人才介绍
                </label>
                <textarea rows="5" id="doc-ipt-introduction">
                </textarea>
            </div>
            <div class="clearfolt">
            </div>
        </div>
    </div>

</form>
<!--人才评定信息 end-->
<!--人才项目信息 start -->
<h3 class="yahei">
    人才项目信息
</h3>
<form class="am-form">
    <div class="width60">
        <div class="am-form-group am-u-sm-12 am-u-md-6">
            <label for="doc-ipt-projectname">
                项目名称:
            </label>
            <input type="text" class="" id="doc-ipt-projectname" placeholder="项目名称">
        </div>
        <div class="am-form-group  am-u-sm-12 am-u-md-3">
            <label>
                项目状态
            </label>
            <select id="doc-select-1">
                <option value="option1">
                    未启动
                </option>
                <option value="option2">
                    正常
                </option>
                <option value="option3">
                    延期
                </option>
                <option value="option3">
                    暂停
                </option>
            </select>
            <span class="am-form-caret">
            </span>
        </div>
        <div class="am-form-group  am-u-offset-3">
        </div>
        <div class="clearfolt">
        </div>
        <div class="am-form-group am-u-md-12">
            <label for="doc-ipt-talentintroduction">
                人才介绍
            </label>
            <textarea rows="5" id="doc-ipt-talentintroduction">
            </textarea>
        </div>
        <div class="clearfolt">
        </div>
        <div class="am-form-group am-u-md-12">
            <label for="doc-ipt-process">
                项目进程
            </label>
            <textarea rows="5" id="doc-ipt-process">
            </textarea>
        </div>
        <div class="clearfolt">
        </div>
        <div class="am-form-group  am-u-offset-6">
            <label for="doc-ipt-product">
                项目开始到结束时间:
            </label>
            <label class="am-select-inline">
                <select id="doc-select-1">
                    <option value="option1">
                        2015年&nbsp;
                    </option>
                    <option value="option2">
                        2016年
                    </option>
                    <option value="option3">
                        2017年
                    </option>
                    <option value="option2">
                        2018年
                    </option>
                    <option value="option3">
                        2019年
                    </option>
                    <option value="option3">
                        2015年
                    </option>
                </select>
            </label>
            <label class="am-select-inline">
                <select>
                    <option value="option1">
                        1月&nbsp;
                    </option>
                    <option value="option2">
                        2月
                    </option>
                    <option value="option3">
                        3月
                    </option>
                    <option value="option2">
                        4月
                    </option>
                    <option value="option3">
                        5月
                    </option>
                    <option value="option3">
                        6月
                    </option>
                </select>
            </label>
            <label class="am-select-inline">
                <select>
                    <option value="option1">
                        1日&nbsp;
                    </option>
                    <option value="option2">
                        2日
                    </option>
                    <option value="option3">
                        3日
                    </option>
                    <option value="option2">
                        4日
                    </option>
                    <option value="option3">
                        5日
                    </option>
                    <option value="option3">
                        6日
                    </option>
                </select>
            </label>
            到
            <label class="am-select-inline">
                <select>
                    <option value="option1">
                        2015年&nbsp;
                    </option>
                    <option value="option2">
                        2016年
                    </option>
                    <option value="option3">
                        2017年
                    </option>
                    <option value="option2">
                        2018年
                    </option>
                    <option value="option3">
                        2019年
                    </option>
                    <option value="option3">
                        2015年
                    </option>
                </select>
            </label>
            <label class="am-select-inline">
                <select>
                    <option value="option1">
                        1月&nbsp;
                    </option>
                    <option value="option2">
                        2月
                    </option>
                    <option value="option3">
                        3月
                    </option>
                    <option value="option2">
                        4月
                    </option>
                    <option value="option3">
                        5月
                    </option>
                    <option value="option3">
                        6月
                    </option>
                </select>
            </label>
            <label class="am-select-inline">
                <select>
                    <option value="option1">
                        1日&nbsp;
                    </option>
                    <option value="option2">
                        2日
                    </option>
                    <option value="option3">
                        3日
                    </option>
                    <option value="option2">
                        4日
                    </option>
                    <option value="option3">
                        5日
                    </option>
                    <option value="option3">
                        6日
                    </option>
                </select>
            </label>
        </div>
    </div>
</form>
<!--人才项目信息 end-->
<!--工作单位信息 start-->
<div class="clearfolt">
</div>
<h3 class="yahei">
    工作单位信息
</h3>
<form class="am-form">
    <div class="width60">
        <div class="am-form-group am-u-sm-12 am-u-md-6">
            <label for="doc-ipt-workunit">
                工作单位:
            </label>
            <input type="text" class="" id="doc-ipt-workunit" placeholder="工作单位">
        </div>
        <div class="am-form-group  am-u-sm-12 am-u-md-6">
            <label for="doc-ipt-posts">
                职务:
            </label>
            <input type="text" class="am-form-posts" placeholder="职务" id="doc-ipt-professional2">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-6">
            <label for="doc-ipt-workingarea">
                工作面积:
            </label>
            <input type="text" class="" id="doc-ipt-workingarea" placeholder="工作面积">
        </div>
        <div class="am-form-group  am-u-sm-12 am-u-md-6">
            <label for="doc-ipt-registeredaddress">
                注册地址:
            </label>
            <input type="text" class="am-form-field" placeholder="注册地址" id="doc-ipt-registeredaddress">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-6">
            <label for="doc-ipt-workingaddress">
                工作地址:
            </label>
            <input type="text" class="" id="doc-ipt-workingaddress" placeholder="工作地址">
        </div>
        <div class="am-form-group  am-u-sm-12 am-u-md-3">
            <label for="doc-ipt-registeredcapital">
                注册资本:
            </label>
            <input type="text" class="am-form-field" placeholder="注册资本" id="doc-ipt-registeredcapital">
        </div>
        <div class="am-form-group  am-u-sm-12 am-u-md-3">
            <label for="doc-ipt-registration-time">
                注册时间:
            </label>
            <input type="text" class="am-form-field" placeholder="注册时间" id="doc-ipt-registration-time">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-6">
            <label for="doc-select-unit-property">
                单位性质
            </label>
            <select id="doc-select-unit-property">
                <option value="option1">
                    国家行政企业事业单位
                </option>
                <option value="option2">
                    公私合作企业事业单位
                </option>
                <option value="option3">
                    中外合资企业事业单位
                </option>
                <option value="option3">
                    社会组织机构
                </option>
                <option value="option3">
                    国际组织机构
                </option>
                <option value="option3">
                    外资企业事业单位
                </option>
                <option value="option3">
                    私营企业事业单位
                </option>
                <option value="option3">
                    集体企业事业单位
                </option>
                <option value="option3">
                    国防军事企业事业单位
                </option>
            </select>
            <span class="am-form-caret">
            </span>
        </div>
        <div class="am-form-group  am-u-sm-12 am-u-md-3">
            <label>
                人员规模
            </label>
            <select id="doc-select-1">
                <option value="option1">
                    1-50人
                </option>
                <option value="option2">
                    50-150人
                </option>
                <option value="option3">
                    150-500人
                </option>
                <option value="option3">
                    500-1000人
                </option>
                <option value="option3">
                    100-5000人
                </option>
                <option value="option3">
                    5000-10000人
                </option>
                <option value="option3">
                    10000人以上
                </option>
            </select>
            <span class="am-form-caret">
            </span>
        </div>
        <div class="am-form-group  am-u-sm-12 am-u-md-3">
            <label>
                经营规模
            </label>
            <select id="doc-select-1">
                <option value="option1">
                    1-50人
                </option>
                <option value="option2">
                    50-150人
                </option>
                <option value="option3">
                    150-500人
                </option>
                <option value="option3">
                    500-1000人
                </option>
                <option value="option3">
                    100-5000人
                </option>
                <option value="option3">
                    5000-10000人
                </option>
                <option value="option3">
                    10000人以上
                </option>
            </select>
            <span class="am-form-caret">
            </span>
        </div>
        <div class="clearfolt">
        </div>
    </div>
</form>
<!--工作单位信息 end-->
<!--联系人相关信息 start-->
<h3 class="yahei">
    联系人相关信息
</h3>
<form class="am-form">
    <div class="width60">
        <div class="am-form-group am-u-sm-12 am-u-md-3">
            <label for="doc-ipt-relationship">
                与联系人关系:
            </label>
            <input type="text" class="am-form-field" placeholder="与联系人关系" id="doc-ipt-relationship">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-3 ">
            <label for="doc-ipt-relationship-name">
                联系人姓名:
            </label>
            <input type="text" class="am-form-field" placeholder="联系人姓名" id="doc-ipt-relationship-name">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-6">
            <label for="doc-ipt-relationship-company">
                联系人单位:
            </label>
            <input type="text" class="am-form-field" placeholder="联系人姓名" id="doc-ipt-relationship-company">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-6">
            <label for="doc-ipt-relationship-post">
                联系人职务:
            </label>
            <input type="text" class="am-form-field" placeholder="联系人职务" id="doc-ipt-relationship-post">
        </div>
        <div class="clearfolt">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-6">
            <label for="doc-ipt-relationship-phone">
                联系人手机号码:
            </label>
            <input type="tel" class="am-form-field" placeholder="联系人手机号码" id="doc-ipt-relationship-phone">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-6">
            <label for="doc-ipt-relationship-qq">
                联系人QQ号码:
            </label>
            <input type="tel" class="am-form-field" placeholder="联系人QQ号码" id="doc-ipt-relationship-qq">
        </div>
        <div class="clearfolt">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-4">
            <label for="doc-ipt-relationship-tel">
                联系人办公电话:
            </label>
            <input type="text" class="am-form-field" placeholder="联系人手机号码" id="doc-ipt-relationship-tel">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-4">
            <label for="doc-ipt-relationship-fax">
                联系人传真:
            </label>
            <input type="text" class="am-form-field" placeholder="联系人传真" id="doc-ipt-relationship-fax">
        </div>
        <div class="am-form-group am-u-sm-12 am-u-md-4">
            <label for="doc-ipt-relationship-mail">
                联系人E-mail:
            </label>
            <input type="tel" class="am-form-field" placeholder="联系人E-mail" id="doc-ipt-relationship-mail">
        </div>
    </div>
</form>
<!--联系人相关信息 end-->
<div class="width60">
    <div class="am-form-group">
        <div class="am-u-md-6 am-u-sm-12 centers">
            <button type="submit" class="am-btn am-btn-default am-btn-primary paddinglr">
                确认提交
            </button>
        </div>
        <div class="am-u-md-6 am-u-sm-12 centers">
            <button type="submit" class="am-btn am-btn-default paddinglr">
                取消提交
            </button>
        </div>
    </div>
    <div class="clearfolt">
    </div>
    <br>
    <br>
</div>
</form>
<!--表单内容end-->
</div>
</div>
<!-- content end -->
@stop

@section('foot-assets')

@stop
