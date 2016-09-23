var itemTemplate = $('#templates .item');
var list         = $('#list');

var  recoverDefPlaceHolder = function(itemData){
    var tempElement = document.getElementById('create');

    if(tempElement){
        tempElement.placeholder = " Please add new task here!"
    }
}
/* Function to create item from template , add data to item, add item to List*/
var addItemToPage = function(itemData) {
    var item = itemTemplate.clone()
    item.attr('data-id',itemData.id)
    item.attr('id',itemData.id) //Set Element id. Used by deleteItemFromPage
    item.attr('placeholder','Add task here')

    item.find('.description').text(itemData.description)//content of elememt, inpudet string

    if(itemData.completed) {
        item.addClass('completed')
    }
    list.append(item)

}
var deleteItemFromPage = function(itemData){

    //get id from response data, which equals to element id, as it was updated upon addItemToPage
    var tempName = itemData.id;
    list.slice(itemData, 1);

    var temp =  document.getElementById(tempName);

    if(temp){
       temp.parentNode.removeChild(temp);
    }
    else
    {
        alert(' requested element with wrong id' +itemData.id)
    }
}

/* Get/Request List by name from server */
var loadRequest = $.ajax({
    type: 'GET',
    //url: "https://listalous.herokuapp.com/lists/NIKOLAS_PUR_NIKA/"	
	url: "http://localhost:8080/ToDoList.dev/get_req_handler.php",
		
})

/*Now that we've made the request, we need to update the page whenever the request succeeds.*/
loadRequest.done(function(dataFromServer) {
    var itemsData = dataFromServer.items

    itemsData.forEach(function(itemData) {
        addItemToPage(itemData)
    })
})
/* Iimplement function submit of the form, called upon adding the new item to list from user interfce(todo appl) */
$('#add-form').on('submit', function(event) {

    event.preventDefault()// don't send form to server upon a submit and prevent the page from refreshing

    var itemDescription = event.target.itemDescription.value

    /*Now that we've successfully listened for a form submission,
    we're going to ask the server to save this item into the database*/
    var creationRequest = $.ajax({
        type: 'POST',
        //url: "http://listalous.herokuapp.com/lists/NIKOLAS_PUR_NIKA/items",
		url: "http://localhost:8080/ToDoList.dev/post_req_handler.php",
		data: { description: itemDescription, completed: false }
    })

    /*Finally, we need to add the new item to the list on client side.*/
     creationRequest.done(function(itemDataFromServer) {
        /*update the page with the data with which the server responds.*/
        addItemToPage(itemDataFromServer)
        recoverDefPlaceHolder(itemDataFromServer)
        window.location = window.location
     })
})
/* implement event handler for "complete check mark" in the list*/
$('#list').on('click', '.complete-button', function(event) {
    var item = $(event.target).parent()
    var isItemCompleted = item.hasClass('completed')
    var itemId = item.attr('data-id')
    /*mplement updateRequest for requested item, calls to put function on server*/
    var updateRequest = $.ajax({
        type: 'PUT',
        url: "https://listalous.herokuapp.com/lists/NIKOLAS_PUR_NIKA/items/" + itemId,
        data: { completed: !isItemCompleted }
    })
    /*
    Finally, we'll update the item that has been marked as incomplete or complete.
    Instead of creating a new item, we'll simple add or remove the class 'completed'
    from the specified item (using jQuery's helpful addClass and removeClass functions).
    This will cause the browser to render the item differently, based on the rules written in styles.css.*/
    updateRequest.done(function(itemData) {
        if (itemData.completed) {
            item.addClass('completed')
        } else {
            item.removeClass('completed')
        }
    })
})

/*Allow users to delete items forever.
Implement event handler for "delete check box" in the list*/
$('#list').on('click', '.delete-button', function(event) {

    var item = $(event.target).parent()
    var isItemDeleted = item.hasClass('deleleted')
    var itemId = item.attr('data-id')

    /*mplement delete Request for requested item, calls to put function on server*/
    var deleteRequest = $.ajax({
        type: 'DELETE',
        url: "https://listalous.herokuapp.com/lists/NIKOLAS_PUR_NIKA/items/" + itemId,
        data: { deleted: !isItemDeleted }
    })
    deleteRequest.done(function(itemData) {
       deleteItemFromPage(itemData)
    })
})
