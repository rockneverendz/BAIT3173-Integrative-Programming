<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <h2>Bricks Menu</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th>Meal ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Availability</th>
    </tr>
    <xsl:for-each select="root/menu/meal">
    <tr>
      <td><xsl:value-of select="id" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="description" /></td>
      <td><xsl:value-of select="price" /></td>
      <td><xsl:value-of select="availability" /></td>
    </tr>
    </xsl:for-each>
  </table>
</xsl:template>

</xsl:stylesheet>