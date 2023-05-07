import React, { useState, useEffect } from "react";

interface DadoJSON {
  mensagem: number;
  topico: string;
  qos: string;
}

export default function App() {
  const [data, setData] = useState<DadoJSON[]>([]);

  useEffect(() => {
    const fetchData = async () => {
      const response = await fetch("./microondas.json");
      const jsonDados = await response.json();
      setData(jsonDados);
    };

    fetchData();

    const intervalId = setInterval(fetchData, 2000);

    return () => clearInterval(intervalId);
  }, []);

  return (
    <div>
      <h1>Dados:</h1>
      {data.map((item) => (
        <div key={item.topico}>
          <p>Topico: {item.topico}</p>
          <p>Mensagem: {item.mensagem}</p>
          <p>QoS: {item.qos}</p>
        </div>
      ))}
    </div>
  );
}
