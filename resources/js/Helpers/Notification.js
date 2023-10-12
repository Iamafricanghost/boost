

class Notification{

    success(){
        new Noty({
            type:'success',
            layout: 'topRight',
            text: 'Successfully done',
            timeout: 1000,
        }).show();
    }

    alert(){
        new Noty({
            type:'alert',
            layout: 'topRight',
            text: 'Are you sure?',
            timeout: 1000,
        }).show();
    }

    error(){
        new Noty({
            type:'alert',
            layout: 'topRight',
            text: 'Something went wrong',
            timeout: 1000,
        }).show();
    }
    
    warning(){
        new Noty({
            type:'warning',
            layout: 'topRight',
            text: 'Oops!',
            timeout: 1000,
        }).show();
    }

    image_validation(){
        new Noty({
            type:'error',
            layout: 'topRight',
            text: 'Upload an Image less than 1MB!',
            timeout: 1000,
        }).show();
    }
}

export default Notification = new Notification();