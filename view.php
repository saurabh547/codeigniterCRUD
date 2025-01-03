<h1>Add Employee</h1>
<form action="<?php echo site_url('employees/store'); ?>" method="POST" enctype="multipart/form-data">
    <label>Name:</label>
    <input type="text" name="name" required><br>
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Phone:</label>
    <input type="text" name="phone" required><br>
    <label>Designation:</label>
    <input type="text" name="designation" required><br>
    <label>Image:</label>
    <input type="file" name="image"><br>
    <button type="submit">Save</button>
</form>



<h1>Edit Employee</h1>
<form action="<?php echo site_url('employees/update/' . $employee['id']); ?>" method="POST" enctype="multipart/form-data">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $employee['name']; ?>" required><br>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $employee['email']; ?>" required><br>
    <label>Phone:</label>
    <input type="text" name="phone" value="<?php echo $employee['phone']; ?>" required><br>
    <label>Designation:</label>
    <input type="text" name="designation" value="<?php echo $employee['designation']; ?>" required><br>
    <label>Image:</label>
    <?php if ($employee['image']): ?>
        <img src="<?php echo base_url($employee['image']); ?>" width="50"><br>
    <?php endif; ?>
    <input type="file" name="image"><br>
    <button type="submit">Update</button>
</form>



<h1>Employees</h1>
<a href="<?php echo site_url('employees/create'); ?>">Add Employee</a>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Designation</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?php echo $employee['name']; ?></td>
            <td><?php echo $employee['email']; ?></td>
            <td><?php echo $employee['phone']; ?></td>
            <td><?php echo $employee['designation']; ?></td>
            <td>
                <?php if ($employee['image']): ?>
                    <img src="<?php echo base_url($employee['image']); ?>" width="50">
                <?php endif; ?>
            </td>
            <td>
                <a href="<?php echo site_url('employees/edit/' . $employee['id']); ?>">Edit</a>
                <a href="<?php echo site_url('employees/delete/' . $employee['id']); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
