using DemoNhom9.Models;
using Microsoft.AspNetCore.Mvc;

namespace DemoNhom9.Controllers
{
    [ApiController]
    [Route("api/[Controller]")]
    public class ProductController : Controller
    {
        private static List<Product> products = new List<Product>
        {
            new Product { Id = 1, Name = "Coffee", Category = "Beverage", Price = 3.5m },
            new Product { Id = 2, Name = "Tea", Category = "Beverage", Price = 2.5m },
            new Product { Id = 3, Name = "Juice", Category = "Beverage", Price = 4.0m }
        };

        [HttpGet]
        public ActionResult<IEnumerable<Product>> GetProducts()
        {
            return Ok(products);
        }   

        // Route: POST api/products
        [HttpPost]
        public ActionResult CreateProduct([FromBody] Product newProduct)
        {
            newProduct.Id = products.Count + 1;
            products.Add(newProduct);
            return CreatedAtAction(nameof(GetProductById), new { id = newProduct.Id }, newProduct);
        }

        // Route: GET api/products/{id}
        [HttpGet("{id}")]
        public ActionResult<Product> GetProductById(int id)
        {
            var product = products.FirstOrDefault(p => p.Id == id);
            if (product == null)
            {
                return NotFound($"Product with id {id} not found.");
            }
            return Ok(product);
        }

        // Route: PUT api/products/{id}
        [HttpPut("{id}")]
        public ActionResult UpdateProduct(int id, [FromBody] Product updatedProduct)
        {
            var existingProduct = products.FirstOrDefault(p => p.Id == id);
            if (existingProduct == null)
            {
                return NotFound($"Product with id {id} not found.");
            }

            // Update product details
            existingProduct.Name = updatedProduct.Name;
            existingProduct.Category = updatedProduct.Category;
            existingProduct.Price = updatedProduct.Price;

            return Ok(existingProduct);
        }


        [HttpDelete("{id}")]
        public ActionResult DeleteProduct(int id)
        {
            var product = products.FirstOrDefault(p => p.Id == id);
            if (product == null)
            {
                return NotFound($"Product with id {id} not found.");
            }

            products.Remove(product);
            return Ok($"Product with id {id} deleted successfully.");
        }
    }
}
