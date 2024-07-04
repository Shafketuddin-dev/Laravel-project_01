<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\District;
use App\Models\Thana;
use App\Models\OfficeInformation;
use App\Models\Coverage;

class CoverageCheckController extends Controller
{
    public function coverageCheckMenu()
    {
        return view('backend.cms.coverage.coverage_menu');
    }

    public function addDistrict()
    {
        return view('backend.cms.coverage.district.show');
    }
    public function saveDistrict(Request $request)
    {
        $district = new District();
        $district->en_title = $request->en_title;
        $district->bn_title = $request->bn_title;
        $district->status = $request->status;
        $district->save();
        return redirect(route('admin.manage_district'))->with('message', 'Successfully Added!');
    }
    public function manageDistrict()
    {
        return view('backend.cms.coverage.district.index', [
            'district' => District::get(),
        ]);
    }
    public function editDistrict($id)
    {
        $district = District::find($id);

        return view('backend.cms.coverage.district.edit', [
            'district' => $district
        ]);
    }
    public function updateDistrict(Request $request)
    {
        $district               = District::find($request->district_id);
        $district->en_title = $request->en_title;
        $district->bn_title = $request->bn_title;
        $district->status = $request->status;
        $district->save();
        return redirect(route('admin.manage_district'))->with('message', 'Successfully Updated!');
    }

    public function deleteDistrict(Request $request)
    {
        $district = District::find($request->district_id);
        $district->delete();

        return redirect()->route('admin.manage_district')->with('message', 'Successfully Deleted!');
    }

    public function addThana()
    {
        return view('backend.cms.coverage.thana.show',[
            'district' => District::where('status','1')->get(),
        ]);
    }
    public function saveThana(Request $request)
    {
        $thana = new Thana();
        $thana->district_id = $request->district_id;
        $thana->en_title = $request->en_title;
        $thana->bn_title = $request->bn_title;
        $thana->status = $request->status;
        $thana->save();
        return redirect(route('admin.manage_thana'))->with('message', 'Successfully Added!');
    }
    public function manageThana()
    {
        return view('backend.cms.coverage.thana.index', [
            'thana' => Thana::latest('id')->get(),
        ]);
    }
    public function editThana($id)
    {
        $thana = Thana::find($id);

        return view('backend.cms.coverage.thana.edit', [
            'district' => District::where('status','1')->get(),
            'thana' => $thana
        ]);
    }
    public function updateThana(Request $request)
    {
        $thana               = Thana::find($request->thana_id);
        $thana->district_id = $request->district_id;
        $thana->en_title = $request->en_title;
        $thana->bn_title = $request->bn_title;
        $thana->status = $request->status;
        $thana->save();
        return redirect(route('admin.manage_thana'))->with('message', 'Successfully Updated!');
    }

    public function deleteThana(Request $request)
    {
        $thana = Thana::find($request->thana_id);
        $thana->delete();

        return redirect()->route('admin.manage_thana')->with('message', 'Successfully Deleted!');
    }

    public function addOfficeInformation()
    {
        return view('backend.cms.coverage.office_information.show');
    }
    public function saveOfficeInformation(Request $request)
    {
        $office_information = new OfficeInformation();
        $office_information->en_office_name = $request->en_office_name;
        $office_information->bn_office_name = $request->bn_office_name;
        $office_information->en_address = $request->en_address;
        $office_information->bn_address = $request->bn_address;
        $office_information->en_person_number = $request->en_person_number;
        $office_information->bn_person_number = $request->bn_person_number;
        $office_information->en_hotline_number = $request->en_hotline_number;
        $office_information->bn_hotline_number = $request->bn_hotline_number;
        $office_information->email = $request->email;
        $office_information->status = $request->status;
        $office_information->save();
        return redirect(route('admin.manage_office_information'))->with('message', 'Successfully Added!');
    }
    public function manageOfficeInformation()
    {
        return view('backend.cms.coverage.office_information.index', [
            'office_information' => OfficeInformation::get(),
        ]);
    }
    public function editOfficeInformation($id)
    {
        $office_information = OfficeInformation::find($id);

        return view('backend.cms.coverage.office_information.edit', [
            'office_information' => $office_information
        ]);
    }
    public function updateOfficeInformation(Request $request)
    {
        $office_information               = OfficeInformation::find($request->office_information_id);
        $office_information->en_office_name = $request->en_office_name;
        $office_information->bn_office_name = $request->bn_office_name;
        $office_information->en_address = $request->en_address;
        $office_information->bn_address = $request->bn_address;
        $office_information->en_person_number = $request->en_person_number;
        $office_information->bn_person_number = $request->bn_person_number;
        $office_information->en_hotline_number = $request->en_hotline_number;
        $office_information->bn_hotline_number = $request->bn_hotline_number;
        $office_information->email = $request->email;
        $office_information->status = $request->status;
        $office_information->save();
        return redirect(route('admin.manage_office_information'))->with('message', 'Successfully Updated!');
    }

    public function deleteOfficeInformation(Request $request)
    {
        $office_information = OfficeInformation::find($request->office_information_id);
        $office_information->delete();

        return redirect()->route('admin.manage_office_information')->with('message', 'Successfully Deleted!');
    }

    public function addCoverage()
    {
        return view('backend.cms.coverage.show',[
            'district' => District::where('status','1')->get(),
            'thana' => Thana::where('status','1')->get(),
            'office_information' => OfficeInformation::where('status','1')->get(),
        ]);
    }
    public function saveCoverage(Request $request)
    {
        $coverage = new Coverage();
        $coverage->district_id = $request->district_id;
        $coverage->thana_id = $request->thana_id;
        $coverage->office_information_id = $request->office_information_id;
        $coverage->status = $request->status;
        $coverage->save();
        return redirect(route('admin.manage_coverage'))->with('message', 'Successfully Added!');
    }
    public function manageCoverage()
    {
        return view('backend.cms.coverage.index', [
            'coverage' => Coverage::get(),
        ]);
    }
    public function editCoverage($id)
    {
        $coverage = Coverage::find($id);

        return view('backend.cms.coverage.edit', [
            'district' => District::where('status','1')->get(),
            'thana' => Thana::where('status','1')->get(),
            'office_information' => OfficeInformation::where('status','1')->get(),
            'coverage' => $coverage,
        ]);
    }
    public function updateCoverage(Request $request)
    {
        $coverage               = Coverage::find($request->coverage_id);
        $coverage->district_id = $request->district_id;
        $coverage->thana_id = $request->thana_id;
        $coverage->office_information_id = $request->office_information_id;
        $coverage->status = $request->status;
        $coverage->save();
        return redirect(route('admin.manage_coverage'))->with('message', 'Successfully Updated!');
    }

    public function deleteCoverage(Request $request)
    {
        $coverage = Coverage::find($request->coverage_id);
        $coverage->delete();

        return redirect()->route('admin.manage_coverage')->with('message', 'Successfully Deleted!');
    }

    public function checkArea(Request $request)
    {
        $districtId = $request->district;
        $thanaId = $request->thana;

        $coverageArea = Coverage::where('district_id', $districtId)
            ->where('thana_id', $thanaId)
            ->first();

        if ($coverageArea) {
            return response()->json([
                'status' => 'success',
                'en_office_name' => $coverageArea->officeInformation->en_office_name,
                'bn_office_name' => $coverageArea->officeInformation->bn_office_name,
                'en_address' => $coverageArea->officeInformation->en_address,
                'bn_address' => $coverageArea->officeInformation->bn_address,
                'en_phone' => $coverageArea->officeInformation->en_person_number,
                'bn_phone' => $coverageArea->officeInformation->bn_person_number,
                'en_hotline' => $coverageArea->officeInformation->en_hotline_number,
                'bn_hotline' => $coverageArea->officeInformation->bn_hotline_number,
                'email' => $coverageArea->officeInformation->email,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
            ]);
        }
    }

}
