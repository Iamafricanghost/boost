<template>
    <div class="container-fluid">
          <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                    <!-- <li class="breadcrumb-item"><router-link to="/organ-assign">Assign</router-link></li> -->
                    <li class="breadcrumb-item" @click="$router.go(-1)">Back</li>
                </ol>
             </nav>
        </div>
      </div>
  </template>
  
  <script type="text/javascript">

  </script>
  
  <style type="text/css">
  
  .content-wrapper {
    margin-top: 34px;
  }
  
  </style>