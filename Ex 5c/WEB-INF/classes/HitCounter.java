import java.io.*;
import java.sql.Date;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class HitCounter extends HttpServlet {

   private int hitCount; 

   public void init() { 
      // Reset hit counter.
      hitCount = 0;
   } 

   public void doGet(HttpServletRequest request, HttpServletResponse response)
      throws ServletException, IOException {

      // Set response content type
      response.setContentType("text/html");

      // This method executes whenever the servlet is hit 
      // increment hitCount 
      hitCount++; 
      PrintWriter out = response.getWriter();
      String title = "Total Number of Hits";
        out.println("<html>");
        out.println("<body>");
        out.println("<h1><center>" + title + "</center></h1>");
        out.println("<h1><center>" + hitCount + "</center></h1>");
        out.println("</body>");
        out.println("</html>");
   
   public void destroy() { 
      // This is optional step but if you like you
      // can write hitCount value in your database.
   } 
} 
