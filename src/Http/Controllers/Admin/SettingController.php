<?php

namespace L5Starter\Setting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use L5Starter\Setting\Repositories\SettingRepository;
use L5Starter\Core\Support\DateFormatter;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SettingController extends Controller
{
    /** @var SettingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
    }

    /**
     * Display a listing of the Setting.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->settingRepository->pushCriteria(new RequestCriteria($request));
        $settings = $this->settingRepository->all();
        $dateFormats = DateFormatter::dropdownArray();

        return view('core-templates::admin.settings.index')->with([
            'dateFormats' => $dateFormats,
            'settings' => $settings,
        ]);
    }

    /**
     * Update the specified Setting in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 8) == 'setting_') {
                $skipSave = false;
                $key = substr($key, 8);
                if (! $skipSave) {
                    $this->settingRepository->save($key, $value);
                }
            }
        }

        Flash::success(trans('l5starter::messages.update.success'));

        return redirect(route('admin.settings.index'));
    }
}
