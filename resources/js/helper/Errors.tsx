export default function Errors(err: any) {
  return (
    <ul className="list-disc list-inside">
      {Object.keys(err).map(i => (
        <>
          <li>{err[i]}</li>
        </>
      ))}
    </ul>
  );
}
