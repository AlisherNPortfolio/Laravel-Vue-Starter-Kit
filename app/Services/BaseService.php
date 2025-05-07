<?php

namespace App\Services;

use Illuminate\Http\Request;

abstract class BaseService
{
    protected function redirectBackWithError(string $message)
    {
        return redirect()
                ->back()
                ->withErrors(['error' => $message]);
    }

    protected function redirectBackWith(string $message, string $type = 'success')
    {
        return redirect()
                ->back()
                ->with([$type => $message]);
    }

    protected function redirectWithError(string $route, string $message)
    {
        return redirect()
                ->route($route)
                ->withErrors(['error' => $message]);
    }

    protected function redirectWith(string $route, string $message, string $type = 'success')
    {
        return redirect()
                ->route($route)
                ->with([$type => $message]);
    }

    protected function successRedirectBack(string $message = 'Saqlandi')
    {
        return redirect()
                    ->back()
                    ->with('success', $message);
    }

    protected function getCleanedData(Request $request)
    {
        $data = $request->validated();

        return cleanNullArray($data);
    }

    protected function jsonSuccess(mixed $data = null, string $message = "")
    {
        $response = [
            'success' => true,
        ];

        if ($data) {
            $response['data'] = $data;
        }

        if ($message || $message !== "") {
            $response['message'] = $message;
        }

        return response()->json($response);
    }

    public function jsonError(string $message = "")
    {
        $response = [
            'success' => false,
        ];

        if ($message || $message !== "") {
            $response['message'] = $message;
        }

        return response()->json($response);
    }
}
