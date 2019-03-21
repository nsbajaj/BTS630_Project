# Team_25
  * Carlos A. Gomez
  * Nitish Bajaj
  * Niramay Patel
  
## System Description
We are developing an E-commerce platform, this platform consists of 3 parts:
 1. **An Admin System** This is a Dashboard system which has 2 modules that mix into 1 complete system.
    * **Admin Component:** The site admin has the ability to create Users, and Grant and remove Users Permissions and status, such as the seller, and client, This side also allows for the removal of users from the system or alternatively suspend their Account if infraction to terms is not major. As an Admin, they have the ability to create products and link them to a specific user. Also, the Admin has the ability to approve and disapprove items being potentially sold-as part of a review procedure, or revoke the ability to be sold for any reason whatsoever, such as DMCA or any other reason provided.
    * **User Component**: This is where the user enters and controls all of their information, address, name, postal code, countries, etc, in here we control the methods of payment, the user can create products and submit for approval. Here we keep track of orders placed by the user. If the user also has a Seller Status/Privileges the inventory and the status of submitted products. As well as any orders to be filled. The User also has the ability to remove products.
 2. **A Marketplace System** which is for our customers to list and sell their Product. It will include customization (colour/model, custom order), ability to add Product Name/Description/Instruction/Specifications, choose Shipping options, update quantity (In stock/Out of stock/Continued/Discontinued), price of a product, place the product in a specific category, and a review system for better understanding of the product. It will also contain a "Orders List/Page", which will display which order(s) has been shipped or being processed before shipping. As well as, which order(s) have been delivered to the customer. In addition, an online payment system will allow sellers to receive funds through a PayPal account.
 3. **A Shopping System** which will allow customers to purchase our products, and the marketplace products. It will be an online listing of products (which has the ability to search, to view and purchase the products). Once a purchase has been made, the buyer(s) can rate the product(s), and review product(s). The customer can send a message via the website to the seller regarding any defects or any concerns about their purchase. The online payment system that will allow buyers to pay for their purchase will be PayPal. 

NOTE: The product page will have all the settings to finalize marketplace listing. Verified purchasers will be able to give a product review on the purchased item so that it helps the other customers to understand it better.
 
## List of tasks to be delivered in BTS630
Below are the prototypes we plan to deliver through four iterations:
1. Admin will be able to suspend user accounts.     
2. Admin will be able to add the product(s). 
3. Admin will be able to change the status of a user account, such as making a seller to as an admin.     
4. Admin/Seller will be able to alter products. - Change description, price, quantity, etc.     
5. Admin/Seller will be able to remove products that they added. - Products can be removed if the admin or the seller (who added the product) wants to.     
6. All the users will be able to see the product inventory. Such as in stock, out of stock, the number of items left in stock, discontinued, etc.     
7. Orders to be filled template will be finalized for admin and seller.
8. Orders placed template will be designed and finalized.
9. Category/subcategory Listing and Product Listing Pages will be transitioned to a Grid system with pictures and better UI from text only.
10. Product pages will be enhanced with colour and model specifications.
11. Shipping and handling options will be added to the seller as well as the ability to set prices by shipping.
12. Linkage of the inventory system and product to the product page.
13. The product shopping cart will be created with proper UI and listing all products and model selected by user provide totals and lead to PayPal for paying.
14. PayPal integration for completed payment of the order.
15. Once the user completes the purchase, the user will be able to see and cancel his order and the content of order in his dashboard.
16. Once an order places the admin and seller user will be able to see the order time, where to ship and what items to ship and with what kind of shipping.
17. Activate review system after seller purchases an item.
18. User will be able to add a review for the purchased product.
19. Disprove a review (fraudulent or any other issue).
20. Profile page for all the users.
 
## Iteration 1 Task List

| Number | Task Description | Status |
| --- | --- | --- |
| 1 | Admin will be able to suspend  user accounts.<br /> - This functionality is a soft "ban". If the user did a minor infraction of terms of services to us, the admin will be able to suspend all privileges of the account other than seeing their account that is unable to sell or buy this is for a specific amount of time from a week to a month and is selected as such. | Completed as planned  |
| 2 | Admin will be able to add the product(s) for another specific seller.<br /> - Admin will be able to create products for other sellers that aren't their own as a mean of technical support or any other issue with client end. (This is done by selecting an id in the create menu.) | Need to set up a business rule for sellers for uploading products  |
| 3 | Admin will be able to alter system roles for the other users.<br /> - Admin will be able to change the status of a user account, such as making a seller an admin, or removing seller status, or admin status. | Completed as planned |
| 4 | Admin/(Iteration 2: Seller) will be able to alter the product(s).<br /> - Admin/Seller will be able to change the fields of the product(s), such as name, description, price, etc. | Not completed for seller part, so moved to Iteration 2 |
| 5 | Admin/(Iteration 2: Seller) will be able to remove products that they added. <br /> - Products can be removed if the admin or the seller (who added the product) requires to, this will be done from the inventory page. To remove a product from inventory, Admin/Seller must find the specific product, and then remove it from the dashboard in a remove product screen. | Not completed for seller part, so moved to Iteration 2 |
| 6 | Product inventory, Page will be made<br /> - This is the main product page, we can see the details of the product as well as quantity/stock, price, etc. Admin/Seller will be able to remove products from this page, or discontinue if necesary. | Completed as planned |
| 7 | "Orders To be filled" - Template UI.<br /> - This template is for the future filling of data of orders to fill for the admin/seller. It will show which orders have been filled and which have not. As well as all the details relevant to the order and whether it has been shipped or not. | Completed as planned but it requires some improvement |
| 8 | "Order(s) Placed" - Template UI.<br /> - It will show the orders that they have placed by the user,  content, description of items, how many items, the price of items, the overall cost of the order, relevant taxes if applied, shipped or not shipped status, etc. | Completed as planned but it requires some improvement |

## Iteration 2 Task List

| Number | Task Description | Status |
| --- | --- | --- |
| 1 | Profile page will be available for all users.<br /> - The profile page UI will be improved.<br /> - User will be able to see their information<br /> - User will be able to access the seller functionality<br /> - User will be able to see orders<br /> - User will be able to see products linked to them (inventory) | Not completed as planned. Also need to update task list by seperating each task from this task in next iteration (such as profile page, orders page, etc)  |
| 2 | Category/Subcategory Listing and Product Listing Pages will be transitioned to a Grid System with pictures and better UI.<br /> - The current system shows products in a list of text, we will be changing this UI into a grid that is better looking and more capable. | Product listing, Product page have been redesigned (Contain few bugs), but not Category/Subcategory Listing |
| 3 | Shipping and handling options will be added to the seller as well as the ability to update the shipping charges.<br /> - Current system does not have any shipping option. We will be adding the shipping options for sellers and the ability to change/update the shipping charges. | (NOT DOING THIS TASK IN THIS ITERATION) |
| 4 | Linkage of Inventory System and Product to the Product Page.<br /> - Product and Inventory are linked, if the product is clicked then it will navigate to its product page. | Not completed as planned (if you click an item from the shopping cart, it will not redirect to its product page) |
| 5 | The product shopping cart will be created with proper UI and listing all products and model selected by user.<br /> - The cart will provide a total amount due for buying the product(s) that are in the cart and it will lead to Paypal. | Shopping Cart/Billing Page is currently a dummy page. Placed order currently uses permanent storage, but we would like to move this to session storage (REMOVING PAYPAL) |
| 6 | Users will be able to see their orders history and will have the ability to cancel their recently placed order.<br /> - Once the user completes the purchase, they will be able to see their order on dashbaord and will have the ability to cancel recently placed order. | Not completed as planned. Currently, it does not take any orders, and does not check for inventory  |

## System Description (Scope Changes)

The program scope has changed and we are now down scaling the scope from marketplace to a mere store program (this changes scopes on the database as well). This is now a cellphone store. We are only going to sell different types of cell phones from different manufacturers.
- We will be reducing our categories and sub categories
- There are only two types of user from now on: 1) Admin 2) Customer
- There will not be any shipping fee (FREE SHIPPING)

## Iteration 3 Task List

| Number | Task Description | Status |
| --- | --- | --- |
| 1 | Re-Code methods for managing the categories.<br /> - Categories will be only related to cell phones such as Manufacturers, OS, Storage, etc. |   |
| 2 | Re-Code methods for managing prodcuts and inventories.<br /> - Product Page will be reduced to show cell phones only, considering the new changes. |   |
| 3 | Re-Code methods that handles attributes while adding/viewing the product.<br /> - User will be able to see attributes only related to cell phones such as screen size, memory, colours, etc. |   |
| 4 | Create a product page which will show the information about the product (cell phone) in details.<br /> - This page will display all the attributes of the product, images, price, etc. |   |  
| 4 | Admin will be able to see how many orders are left to fulfill (yet to ship).<br /> - Once the customer completes the payment, it will show on Admin dashbaord, which needs to be shipped |   |
| 5 | Update user roles and authentication according the changes made to the system.<br /> - Remove "Seller" aspect/account(s) from previous System |   |
| 6 | Re-Code photo logic when displaying the list of products.<br /> - Product page will have pictures of the product itself in the grid view as a preview, and the user can click on it, in order to view more details about that perticular product  |   |
