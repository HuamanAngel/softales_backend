using CreateTale.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

// For more information on enabling Web API for empty projects, visit https://go.microsoft.com/fwlink/?LinkID=397860

namespace CreateTale.Controllers
{
    
    [Route("api/[controller]")]
    [ApiController]
    public class TalesController : ControllerBase
    {
        private readonly AplicationDbContext _context;
        public TalesController(AplicationDbContext context)
        {
            _context = context;
        }
        // GET: api/<TalesController>
        [HttpGet]
        public async Task<IActionResult> Get()
        {
            try
            {
                var tales = await _context.Tales.ToListAsync();
                return Ok(tales);
            }catch(Exception e)
            {
                return BadRequest(e.Message);
            }
        }

        // GET api/<TalesController>/5
        [HttpGet("{id}")]
        public async Task<IActionResult> Get(int id)
        {
            try
            {
                var tale = await _context.Tales.FirstOrDefaultAsync(x => x.Id == id);
                return Ok(tale);
            }
            catch (Exception e)
            {
                return BadRequest(e.Message);
            }
        }

        // POST api/<TalesController>
        [HttpPost]
        public async Task<IActionResult> Post([FromBody] Tale tale)
        {
            try
            {
                _context.Add(tale);
                await _context.SaveChangesAsync();
                return Ok(tale);
            }
            catch (Exception e)
            {
                return BadRequest(e.Message);
            }
        }

        // PUT api/<TalesController>/5
        //[HttpPut("{id}")]
        //public void Put(int id, [FromBody] string value)
        //{
        //}

        // DELETE api/<TalesController>/5
        //[HttpDelete("{id}")]
        //public void Delete(int id)
        //{
        //}
    }
}
