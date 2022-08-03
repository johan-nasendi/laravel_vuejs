<template>
   <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sign In</div>

                <div class="card-body">
                    <form method="POST" action="#">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="Enter E-mail" name="email" value="" required autocomplete="email" autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Enter Password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   LOGIN
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
