<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateCustomerRequest;
use App\Http\Requests\Admin\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CustomerController extends AppBaseController
{
    /**
     * Display a listing of the Customer.
     */
    public function index(Request $request)
    {
        /** @var  Customer $customers */
        $customers = Customer::paginate(10);

        return view('admin.customers.index')
            ->with('customers', $customers);
    }


    /**
     * Show the form for creating a new Customer.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created Customer in storage.
     */
    public function store(CreateCustomerRequest $request)
    {
        $input = $request->all();

        /** @var  Customer $customer */
        $customer = Customer::make($input);
        $customer->password = \Hash::make($request->input('password'));
        $customer->save();

        Flash::success('Customer saved successfully.');

        return redirect(route('admin.customers.index'));
    }

    /**
     * Display the specified Customer.
     */
    public function show($id)
    {
        /** @var  Customer $customer */
        $customer = Customer::find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('admin.customers.index'));
        }

        return view('admin.customers.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified Customer.
     */
    public function edit($id)
    {
        /** @var  Customer $customer */
        $customer = Customer::find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('admin.customers.index'));
        }

        return view('admin.customers.edit')->with('customer', $customer);
    }

    /**
     * Update the specified Customer in storage.
     */
    public function update($id, UpdateCustomerRequest $request)
    {
        /** @var  Customer $customer */
        $customer = Customer::find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('admin.customers.index'));
        }

        $customer->fill($request->all());
        $customer->password = \Hash::make($request->input('password'));
        $customer->save();

        Flash::success('Customer updated successfully.');

        return redirect(route('admin.customers.index'));
    }

    /**
     * Remove the specified Customer from storage.
     *
     * @throws  \Exception
     */
    public function destroy($id)
    {
        /** @var  Customer $customer */
        $customer = Customer::find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('admin.customers.index'));
        }

        $customer->delete();

        Flash::success('Customer deleted successfully.');

        return redirect(route('admin.customers.index'));
    }

    public function customer_list(Request $request)
    {
        return $this->sendResponse(Customer::select('name', 'email', 'phone')->get(), 'buu');
        // return Customer::where()->get();
    }
}
