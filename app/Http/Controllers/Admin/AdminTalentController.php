<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Talent;

class AdminTalentController extends AdminController
{
    public $table = 'talent';
    public $primaryNav = '人才信息';

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'name' => '姓名',
            'gender' => '性别',
            'nationality' => '国籍',
            'nation' => '民族',
            'birth' => '生日',
            'martial' => '婚姻状况',
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
                'primaryNav' => $this->primaryNav,
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

    public function postIndex(HttpRequest $request)
    {
        // 还有好多验证
        $this->validate($request, [
            // 'name' => '',
            'gender' => 'in:1,2,3,未知,男,女',
            // 'nationality' => '',
            // 'nation' => '',
            'birth' => 'regex:\d{4}-\d{2}-\d{2}',
            'martial' => 'in:1,2,3,未婚,已婚,离异',
            // 'birthAddress' => '',
            // 'registeredAddress' => '',
            // 'politicsStatus' => '',
            // 'degree' => '',
            // 'professionalTitle' => '',
            // 'workYear' => '',
            // 'telephone' => '',
            // 'mobile' => '',
            // 'email' => 'email',
            // 'address' => '',
            // 'school1' => '',
            // 'major1' => '',
            // 'school2' => '',
            // 'major2' => '',
            // 'school3' => '',
            // 'major3' => '',
            // 'returnee' => '',
            // 'foreignOffice' => '',
            // 'office' => '',
            // 'position' => '',
            // 'type' => '',
            // 'category' => '',
        ]);

        $talent = Talent::create(Request::all());

        return response()->json($talent);
    }

    public function postExprience()
    {

    }

    public function postEvaluation()
    {

    }

    public function postProject()
    {

    }

    public function postOffice()
    {

    }

    public function postRelation()
    {
        
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:talent,id',
        ]);

        $inputs = Request::all();
        $talent = Talent::find($inputs['id']);
        $talent->update($inputs);

        return response()->json($talent);
    }
}
