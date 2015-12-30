<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Talent;
use App\Models\TalentExperience;
use App\Models\TalentEvaluation;
use App\Models\TalentOffice;
use App\Models\TalentProject;
use App\Models\TalentRelation;

class AdminTalentController extends AdminController
{
    public $table = 'talent';
    public $primaryNav = '人才信息';
    public $genders = ['男', '女'];
    public $nations = ['汉族', '蒙古族', '回族', '藏族', '维吾尔族', '苗族', '彝族', '壮族', '布依族', '朝鲜族', '满族', '侗族', '瑶族', '白族', '土家族', '哈尼族', '哈萨克族', '傣族', '黎族', '傈僳族', '佤族', '畲族', '高山族', '拉祜族', '水族', '东乡族', '纳西族', '景颇族', '柯尔克孜族', '土族', '达斡尔族', '仫佬族', '羌族', '布朗族', '撒拉族', '毛南族', '仡佬族', '锡伯族', '阿昌族', '普米族', '塔吉克族', '怒族', '乌孜别克族', '俄罗斯族', '鄂温克族', '德昂族', '保安族', '裕固族', '京族', '塔塔尔族', '独龙族', '鄂伦春族', '赫哲族', '门巴族', '珞巴族', '基诺族', '其他'];
    public $countries = ['阿拉伯联合酋长国', '阿富汗', '安提瓜和巴布达', '安圭拉岛', '阿尔巴尼亚', '亚美尼亚', '阿森松', '安哥拉', '阿根廷', '奥地利', '澳大利亚', '阿塞拜疆', '巴巴多斯', '孟加拉国', '比利时', '布基纳法索', '保加利亚', '巴林', '布隆迪', '贝宁', '巴勒斯坦', '百慕大群岛', '文莱', '玻利维亚', '巴西', '巴哈马', '博茨瓦纳', '白俄罗斯', '伯利兹', '加拿大', '开曼群岛', '中非共和国', '刚果', '瑞士', '库克群岛', '智利', '喀麦隆', '中国', '哥伦比亚', '哥斯达黎加', '捷克', '古巴', '塞浦路斯', '捷克', '德国', '吉布提', '丹麦', '多米尼加共和国', '阿尔及利亚', '厄瓜多尔', '爱沙尼亚', '埃及', '西班牙', '埃塞俄比亚', '芬兰', '斐济', '法国', '加蓬', '英国', '格林纳达', '格鲁吉亚', '法属圭亚那', '加纳', '直布罗陀', '冈比亚', '几内亚', '希腊', '危地马拉', '关岛', '圭亚那', '香港特别行政区', '洪都拉斯', '海地', '匈牙利', '印度尼西亚', '爱尔兰', '以色列', '印度', '伊拉克', '伊朗', '冰岛', '意大利', '科特迪瓦', '牙买加', '约旦', '日本', '肯尼亚', '吉尔吉斯坦', '柬埔寨', '朝鲜', '韩国', '科特迪瓦共和国', '科威特', '哈萨克斯坦', '老挝', '黎巴嫩', '圣卢西亚', '列支敦士登', '斯里兰卡', '利比里亚', '莱索托', '立陶宛', '卢森堡', '拉脱维亚', '利比亚', '摩洛哥', '摩纳哥', '摩尔多瓦', '马达加斯加', '马里', '缅甸', '蒙古', '澳门', '蒙特塞拉特岛', '马耳他', '马里亚那群岛', '马提尼克', '毛里求斯', '马尔代夫', '马拉维', '墨西哥', '马来西亚', '莫桑比克', '纳米比亚', '尼日尔', '尼日利亚', '尼加拉瓜', '荷兰', '挪威', '尼泊尔', '荷属安的列斯', '瑙鲁', '新西兰', '阿曼', '巴拿马', '秘鲁', '法属玻利尼西亚', '巴布亚新几内亚', '菲律宾', '巴基斯坦', '波兰', '波多黎各', '葡萄牙', '巴拉圭', '卡塔尔', '留尼旺', '罗马尼亚', '俄罗斯', '沙特阿拉伯', '所罗门群岛', '塞舌尔', '苏丹', '瑞典', '新加坡', '斯洛文尼亚', '斯洛伐克', '塞拉利昂', '圣马力诺', '东萨摩亚', '西萨摩亚', '塞内加尔', '索马里', '苏里南', '圣多美和普林西比', '萨尔瓦多', '叙利亚', '斯威士兰', '乍得', '多哥', '泰国', '塔吉克斯坦', '土库曼斯坦', '突尼斯', '汤加', '土耳其', '特立尼达和多巴哥', '台湾省', '坦桑尼亚', '乌克兰', '乌干达', '美国', '乌拉圭', '乌兹别克斯坦', '圣文森特岛', '委内瑞拉', '越南', '也门', '南斯拉夫', '南非', '赞比亚', '扎伊尔', '津巴布韦'];
    public $politics = ['群众', '共青团员', '共产党员', '民主党派', '无党派'];
    public $maritals = ['未婚', '已婚', '离异'];
    public $degrees = ['博士', '硕士', '本科', '大专', '高中', '初中'];

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'name' => '姓名',
            'gender' => '性别',
            'nationality' => '国籍',
            'nation' => '民族',
            'birth' => '生日',
            'marital' => '婚姻状况',
            'birthAddress' => '籍贯',
            'registeredAddress' => '户口所在地',
            'politicsStatus' => '政治面貌',
            'degree' => '最高学历',
            'professionalTitle' => '职称',
            'workYear' => '工作经验',
            'telephone' => '联系电话',
            'mobile' => '手机号码',
            'email' => '电子邮箱',
            'address' => '联系地址',
            'school1' => '毕业学校1',
            'major1' => '毕业专业1',
            'school2' => '毕业学校2',
            'major2' => '毕业专业2',
            'school3' => '毕业学校3',
            'major3' => '毕业专业3',
            'returnee' => '是否海归',
            'foreignOffice' => '归国前单位',
            'office' => '单位',
            'position' => '职务',
            'type' => '人才类型',
            'category' => '人才分类',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];

        return view('admin.list', [
                'fields' => $fields,
                'secondaryNav' => '人才列表',
            ]
        );
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $pagination = parent::pagination(Talent::select('*'));

        return response()->json($pagination);
    }

    public function getNew()
    {
        return view('admin.talent.new', [
            'nations' => $this->nations,
            'countries' => $this->countries,
        ]);
    }

    public function postIndex(HttpRequest $request)
    {
        return $this->postInfo('Talent', $request, [
            'name' => 'required',
            'gender' => 'in:1,2,3,未知,男,女',
            'nationality' => 'max:100',
            'nation' => 'max:20',
            'birth' => ['regex:/^\d{4}-\d{2}$/'],
            'marital' => 'in:1,2,3,未婚,已婚,离异',
            'birthAddress' => 'max:100',
            'registeredAddress' => 'max:100',
            'politicsStatus' => 'max:4',
            'degree' => 'max:2',
            'professionalTitle' => 'max:50',
            'workYear' => '20',
            'telephone' => 'max:20',
            'mobile' => 'max:20',
            'email' => 'email,max:100',
            'address' => 'max:100',
            'school1' => 'max:50',
            'major1' => 'max:50',
            'school2' => 'max:50',
            'major2' => 'max:50',
            'school3' => 'max:50',
            'major3' => 'max:50',
            'returnee' => 'in:1,2,是,否',
            'foreignOffice' => 'max:100',
            'office' => 'max:100',
            'position' => 'max:50',
            'type' => 'required|max:20',
            'category' => 'required|max:20',
        ]);
    }

    public function postExperience(HttpRequest $request)
    {
        return $this->postInfo('TalentExperience', $request, [
            'tid' => 'required|exists:talent,id',
            'type' => 'required|max:20',
            'office' => 'required|max:100',
            // 'content' => 'required',
            'start' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
            'end' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
        ]);
    }

    public function postEvaluation(HttpRequest $request)
    {
        return $this->postInfo('TalentEvaluation', $request, [
            'tid' => 'required|exists:talent,id',
            'type' => 'required|max:50',
            'category' => 'required|max:50',
            'date' => 'regex:/^\d{4}-\d{2}$/',
            'batch' => 'max:50',
            'result' => 'required|max:100',
        ]);
    }

    public function postProject(HttpRequest $request)
    {
        return $this->postInfo('TalentProject', $request, [
            'tid' => 'required|exists:talent,id',
            'name' => 'required|max:100',
            'desc' => 'required',
            'status' => 'max:20',
            'progress' => 'max:20',
            'start' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
            'end' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
        ]);
    }

    public function postOffice(HttpRequest $request)
    {
        return $this->postInfo('TalentOffice', $request, [
            'tid' => 'required|exists:talent,id',
            'office' => 'required|max:50',
            'position' => 'max:50',
            'start' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
            'end' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
        ]);
    }

    public function postRelation(HttpRequest $request)
    {
        return $this->postInfo('TalentRelation', $request, [
            'tid' => 'required|exists:talent,id',
            'relation' => 'required|max:10',
            'name' => 'required|max:20',
            'office' => 'required|max:50',
            'position' => 'max:20',
            'mobile' => 'max:20',
            'qq' => 'max:20',
            'office_phone' => 'max:20',
            'office_fax' => 'max:20',
            'email' => 'email',
        ]);
    }

    public function getEdit(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:talent,id',
        ]);

        $id = Request::get('id');
        $maps = ['countries', 'nations', 'genders', 'maritals', 'degrees', 'politics'];
        $mapsData = [];
        foreach ($maps as $value) {
            $mapsData[$value] = $this->$value;
        }
        $models = ['experience', 'evaluation', 'project', 'office', 'relation'];
        $orms = [];
        foreach ($models as $value) {
            $m = 'App\Models\Talent' . ucfirst($value);
            $orms[$value . 's'] = $m::where('tid', $id)->get();
        }

        return view('admin.talent.edit', array_merge($mapsData, $orms, [
            'talent' => Talent::find($id),
        ]));
    }

    public function putIndex(HttpRequest $request)
    {
        return $this->putInfo('Talent', $request, [
            'id' => 'required|exists:talent,id',
            'name' => 'required',
            'gender' => 'in:1,2,3,未知,男,女',
            'nationality' => 'max:100',
            'nation' => 'max:20',
            'birth' => ['regex:/^\d{4}-\d{2}$/'],
            'marital' => 'in:1,2,3,未婚,已婚,离异',
            'birthAddress' => 'max:100',
            'registeredAddress' => 'max:100',
            'politicsStatus' => 'max:4',
            'degree' => 'max:2',
            'professionalTitle' => 'max:50',
            'workYear' => '20',
            'telephone' => 'max:20',
            'mobile' => 'max:20',
            'email' => 'email,max:100',
            'address' => 'max:100',
            'school1' => 'max:50',
            'major1' => 'max:50',
            'school2' => 'max:50',
            'major2' => 'max:50',
            'school3' => 'max:50',
            'major3' => 'max:50',
            'returnee' => 'in:1,2,是,否',
            'foreignOffice' => 'max:100',
            'office' => 'max:100',
            'position' => 'max:50',
            'type' => 'required|max:20',
            'category' => 'required|max:20',
        ]);
    }

    public function putExperience(HttpRequest $request)
    {
        return $this->putInfo('TalentExperience', $request, [
            'id' => 'required|exists:talent_experience,id',
            'tid' => 'required|exists:talent,id',
            'type' => 'required|max:20',
            'office' => 'required|max:100',
            // 'content' => 'required',
            'start' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
            'end' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
        ]);
    }

    public function putEvaluation(HttpRequest $request)
    {
        return $this->putInfo('TalentEvaluation', $request, [
            'id' => 'required|exists:talent_evaluation,id',
            'tid' => 'required|exists:talent,id',
            'type' => 'required|max:50',
            'category' => 'required|max:50',
            'date' => 'regex:/^\d{4}-\d{2}$/',
            'batch' => 'max:50',
            'result' => 'required|max:100',
        ]);
    }

    public function putProject(HttpRequest $request)
    {
        return $this->putInfo('TalentProject', $request, [
            'id' => 'required|exists:talent_project,id',
            'tid' => 'required|exists:talent,id',
            'name' => 'required|max:100',
            'desc' => 'required',
            'status' => 'max:20',
            'progress' => 'max:20',
            'start' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
            'end' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
        ]);
    }

    public function putOffice(HttpRequest $request)
    {
        return $this->putInfo('TalentOffice', $request, [
            'id' => 'required|exists:talent_office,id',
            'tid' => 'required|exists:talent,id',
            'office' => 'required|max:50',
            'position' => 'max:50',
            'start' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
            'end' => 'regex:/^\d{4}-\d{2}-\d{2}$/',
        ]);
    }

    public function putRelation(HttpRequest $request)
    {
        return $this->putInfo('TalentRelation', $request, [
            'id' => 'required|exists:talent_relation,id',
            'tid' => 'required|exists:talent,id',
            'relation' => 'required|max:10',
            'name' => 'required|max:20',
            'office' => 'required|max:50',
            'position' => 'max:20',
            'mobile' => 'max:20',
            'qq' => 'max:20',
            'office_phone' => 'max:20',
            'office_fax' => 'max:20',
            'email' => 'email',
        ]);
    }

    public function deleteInfo(HttpRequest $request)
    {
        $this->validate($request, [
            'table' => 'required|in:experience,evaluation,project,office,relation',
            'id' => 'required|integer',
        ]);

        $model = 'App\\Models\\Talent' . ucfirst(Request::get('table'));
        $affectedRows = $model::destroy(Request::get('id'));

        return response()->json([
            'affectedRows' => $affectedRows,
        ]);
    }
}
