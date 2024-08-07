<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
      
      .my-5 {
        margin-top: 3rem;
        margin-bottom: 3rem;
      }

      .d-flex {
        display: flex;
      }

      .align-items-center {
        align-items: center;
      }

      .justify-content-center {
        justify-content: center;
      }

      .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
      }

      .mb-3 {
        margin-bottom: 1rem;
      }

      .form-label {
        margin-bottom: 0.5rem;
        display: block;
      }

      .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      }

      .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        cursor: pointer;
      }

      .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
      }
    </style>

    <title>Flat Booking</title>
  </head>
  <body>
    <h4 class="my-5 d-flex align-items-center justify-content-center">Update Client Data</h4>
    <div class="container my-5">
      <form method="post">
        <div class="mb-3"> 
          <label class="form-label">Name</label>
          <input type="text" class="form-control" placeholder="Update Name" autocomplete="off" name="name">

          <div class="mb-3">
            <label class="form-label">Email.</label>
            <input type="email" class="form-control" placeholder="Update Email." autocomplete="off" name="email">
          </div>

          <div class="mb-3">
            <label class="form-label">check_in</label>
            <input type="tex" class="form-control" placeholder="Update check_in" autocomplete="off" name="check_in">
          </div>

          <div class="mb-3">
            <label class="form-label">check_out</label>
            <input type="text" class="form-control" placeholder="Update check_out." autocomplete="off" name="check_out">
          </div>

          <div class="mb-3">
            <label class="form-label">room_type</label>
            <input type="room_type" class="form-control" placeholder="Update room_type" autocomplete="off" name="room_type">
          </div>

          <div class="mb-3">
            <label class="form-label">message</label>
            <input type="text" class="form-control" placeholder="Update message" autocomplete="off" name="message">
          </div>

          <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </div>
      </form>
    </div>
  </body>
</html>
