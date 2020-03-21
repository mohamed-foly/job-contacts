<meta charset="UTF-8">
<table class="table">
    <thead>
        <th>Company Name</th>
        <th>E-Mail Address</th>
        <th>Position</th>
        <th>Created At</th>
    </thead>
    <tbody>
        @foreach($jobs as $job)
            <tr>
                <td>{{ $job->company_name }}</td>
                <td>{{ $job->email }}</td>
                <td>{{ $job->position }}</td>
                <td>{{ $job->created_at }}</td>
            </tr>
        @endforeach
    </tbody>    
</table>