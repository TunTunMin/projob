<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Type;
use Illuminate\Http\Request;
use Validator;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;
// use Intervention\Image\Facades\Image;
use Storage;
use Illuminate\Auth\Access\Gate;

class CompanyController extends Controller
{
    public function __construct()
    {
        if (Gate::denies('is-admin', Auth()->user())) {
            abort(403, "You don't have for this permission");
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_name = $request['search_name'];
        $data = Company::select('*');
        if ($search_name <> null) {
            $data = $data->where('name', 'LIKE', '%' . $search_name . '%');
        }
        $data = $data->paginate(10);
        return view('company.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('company.create')->with('types', $types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $logo = $_FILES['logo'];

        if (!empty($logo['name'])) {
            $input['logo'] = self::save_image($logo['tmp_name']);
        } else {
            $input['logo'] = null;
        }
        $cover_photo = $_FILES['cover_photo'];
        // dd(empty($cover_photo['name']));
        if (!empty($cover_photo['name'])) {

            $input['cover_photo'] = self::save_image($cover_photo['tmp_name']);
        } else {
            $input['cover_photo'] = null;
        }

        $gallery = $_FILES['gallery'];

        if ($files = $request->file('gallery')) {
            $destinationPath = public_path('/projob_images/');

            foreach ($files as $img) {
                $gallery_image = $img->getClientOriginalName();

                $img->move($destinationPath, $gallery_image);
                $input['gallery'][] = $gallery_image;
            }
        } else {
            $input['gallery'][] = null;
        }
        //    dd('afaf');
        $request->except(['logo', 'cover_photo', 'gallery', '_token']);
        //    dd($request->all());
        $company = new Company;
        $company->name = $request['name'];
        $company->type_id = $request['type_id'];
        $company->company_overview = $request['company_overview'];
        $company->register_no = $request['register_no'];
        $company->ea_no = $request['ea_no'];
        $company->ea_register_no = $request['ea_register_no'];
        $company->company_size = $request['company_size'];
        $company->industry = $request['industry'];
        $company->location = $request['location'];
        $company->average_processtime = $request['average_processtime'];
        $company->benefit_other = $request['benefit_other'];
        $company->logo = $input['logo'];
        $company->cover_photo = $input['cover_photo'];
        $company->gallery = json_encode($input['gallery']);
        $company->website = $request['website'];
        $company->facebook = $request['facebook'];
        $company->save();

        return redirect('/company')
            ->with('status', 'Your data are successfully stored');
    }

    public function save_image($tmp_name)
    {
        $file_name = time() . '.jpg';
        $tmp_file = $tmp_name;
        $img = Image::make($tmp_file);
        $img->resize(320, 240);
        $img->save(public_path('/projob_images/' . $file_name));
        return $file_name;
    }

    // delete from public folder
    public function delete_image($photo)
    {

        return \File::delete(public_path('/projob_images/' . $photo));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show')
            ->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        // dd($company->id);
        $types = Type::all();
        return view('company.edit')
            ->with('types', $types)
            ->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $input = [];
        $logo = $_FILES['logo'];
        if (!empty($logo['name'])) {
            $input['logo'] = self::save_image($logo['tmp_name']);
        } elseif (!empty($request['logo_hidden'])) {
            $input['logo'] = $request['logo_hidden'];
        } else {
            $input['logo'] = null;
        }
        $cover_photo = $_FILES['cover_photo'];

        if (!empty($cover_photo['name'])) {
            $input['cover_photo'] = self::save_image($cover_photo['tmp_name']);
        } elseif (!empty($request['cover_hidden'])) {
            $input['cover_photo'] = $request['cover_hidden'];
        } else {
            $input['cover_photo'] = null;
        }

        $gallery = $_FILES['gallery'];
        //    dd(array_filter(json_decode($request['gallery_hidden'])));
        // $gallery_validate = $request->validate([
        //     'gallery' => 'mimes:jpeg,jpg,png,gif,svg|required|max:10000' // max 10000kb
        // ]);

        $input['gallery'] = [];
        if ($files = $request->file('gallery')) {
            $destinationPath = public_path('/projob_images/');

            foreach ($files as $img) {
                $gallery_image = $img->getClientOriginalName();
                $img->move($destinationPath, $gallery_image);
                $input['gallery'][] = $gallery_image;
            }
        }

        if (count(array_filter(json_decode($request['gallery_hidden']))) > 0) {

            $input['gallery'][] = json_decode($request['gallery_hidden']);
        }
        //    dd(json_encode(array_flatten($input['gallery'])));
        // Logo Delete
        if ($request['logo_del'] <> null) {
            self::delete_image($request['logo_del']);
        }
        //    Cover Photo Delete
        if ($request['cover_del'] <> null) {
            self::delete_image($request['cover_del']);
        }
        $company->name = $request['name'];
        $company->type_id = $request['type_id'];
        $company->company_overview = $request['company_overview'];
        $company->register_no = $request['register_no'];
        $company->ea_no = $request['ea_no'];
        $company->ea_register_no = $request['ea_register_no'];
        $company->company_size = $request['company_size'];
        $company->industry = $request['industry'];
        $company->location = $request['location'];
        $company->average_processtime = $request['average_processtime'];
        $company->benefit_other = $request['benefit_other'];

        $company->logo = $input['logo'];
        $company->cover_photo = $input['cover_photo'];
        $company->gallery = json_encode(array_flatten($input['gallery']));
        $company->website = $request['website'];
        $company->facebook = $request['facebook'];
        $company->update();

        return redirect('/company')
            ->with('status', 'Your data are successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if (count($company->jobs()->get()) < 1) {
            $company->jobs()->delete();
            $company->delete();
            $status = "Your data are successfully deleted";
        } else {
            $status = "Don't delete this item because it has child elements";
        }

        return redirect('/company')
            ->with('status', $status);
    }
}
