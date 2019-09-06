{{ Session::put($customer->id) }}


{{ Session::put('customerName',$customer->first_name.''.$customer->last_name) }}